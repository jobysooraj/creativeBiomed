<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ServicesService;
use App\Services\CategoryService;
use App\Http\Requests\ServiceRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class ServiceController extends Controller
{
    use ImageUploadTrait;
    protected $serviceService;
    protected $categoryService;

    public function __construct(ServicesService $serviceService,CategoryService $categoryService)
    {
        $this->serviceService = $serviceService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Services', 'url' => route('services.index')],
            ['name' => 'Lists', 'url' => null]
        ];

        if ($request->ajax()) {
            $services = $this->serviceService->getAllServices();

            return DataTables::of($services)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $imageUrl = asset('storage/' . $row->image);
                    return '<img src="' . $imageUrl . '" alt="Service Image" width="50" height="50" />';
                })
                ->addColumn('category', function ($row) {
                    
                    return $row->category->name;
                })
                ->addColumn('service', function ($row) {
                    
                    return $row->name;
                })
                ->addColumn('status', function ($row) {
                    return $row->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('services.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                            <form action="' . route('services.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field("DELETE") . '
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                })
                ->rawColumns(['action', 'image','status'])
                ->make(true);
        }

        return view('admin.services.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Services', 'url' => route('services.index')],
            ['name' => 'Create', 'url' => null]
        ];
        $categories = $this->categoryService->getAllCategories();
        return view('admin.services.create', compact('breadcrumbs','categories'));
    }

    public function store(ServiceRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), 'service');
            }
         
            $this->serviceService->createService($data);

            DB::commit();
            return redirect()->route('services.index')->with('success', 'Service Created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error creating service. Please try again.');
        }
    }

    public function edit(Service $service)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Services', 'url' => route('services.index')],
            ['name' => 'Edit', 'url' => null]
        ];
        $categories = $this->categoryService->getAllCategories();
        return view('admin.services.edit', compact('service', 'breadcrumbs','categories'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $service=Service::find($id);
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                if ($service->image) {
                    Storage::disk('public')->delete($service->image);
                }
                $data['image'] = $this->uploadImage($request->file('image'), 'service');
            }
           
            $this->serviceService->updateService($service->id, $data);

            DB::commit();
            return redirect()->route('services.index')->with('success', 'Service updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error updating service. Please try again.');
        }
    }

    public function destroy(Service $service)
    {
        DB::beginTransaction();
        try {
            $this->serviceService->deleteService($service->id);

            DB::commit();
            return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting service. Please try again.');
        }
    }
}