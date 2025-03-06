<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutusRequest;
use App\Services\AboutusService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;


class AboutUsController extends Controller
{
    use ImageUploadTrait;  // Use the trait here

    protected $aboutusService;

    public function __construct(AboutusService $aboutusService)
    {
        $this->aboutusService = $aboutusService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'About Us', 'url' => route('aboutuses.index')],
            ['name' => 'Lists', 'url' => null] // Null for the current page
            ];
            $aboutuses = $this->aboutusService->getAllAbouts();
            $countAboutUs=$aboutuses->count();
            if ($request->ajax()) {
              
                
                return DataTables::of($aboutuses)
                    ->addIndexColumn() 
                    ->addColumn('image', function ($row) {
                        $imageUrl = asset('storage/'.$row->image); // Adjust path based on storage
                        return '<img src="'.$imageUrl.'" alt="About us Image" width="50" height="50" />';
                    })
                    ->addColumn('description', function ($row) {
                     
                        return $row->description;
                    })
                    ->addColumn('action', function ($row) {
                        return '<a href="'.route('aboutuses.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>
                                <form action="'.route('aboutuses.destroy', $row->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                    })
                    ->rawColumns(['action','image','description']) // Allows HTML rendering in the action column
                    ->make(true);
            }
        return view('admin.aboutus.index',compact('breadcrumbs','countAboutUs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'About Us', 'url' => route('aboutuses.index')],
            ['name' => 'Create', 'url' => null] // Null for the current page
            ];
       return view('admin.aboutus.create',compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutusRequest $request)
    {
        $data = $request->validated(); // First, validate input

        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('image')) {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'aboutus');
                }
            }
        
            $this->aboutusService->createAboutus($data);

            DB::commit(); // Commit transaction

            return redirect()->route('aboutuses.index')->with('success', 'Your About us has been submitted!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aboutus $aboutus)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'About us', 'url' => route('aboutuses.index')],
            ['name' => 'Edit', 'url' => null] // Null for the current page
        ];
      
        return view('admin.aboutus.edit', compact('aboutus','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutusRequest $request, Aboutus $aboutus)
    {
        $data = $request->validated(); // Validate input
       
        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('image')) {
                if ($aboutus->image) {
                    Storage::disk('public')->delete($aboutus->image);
                }
                $data['image'] = $this->uploadImage($request->file('image'), 'aboutus');
            }
            $this->aboutusService->updateAboutus($aboutus->id, $data);

            DB::commit(); 
            return redirect()->route('aboutuses.index')->with('success', 'Aboutus updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aboutus $aboutus)
    {
        DB::beginTransaction();
        try {
            if ($aboutus->image) {
                $this->deleteImage($aboutus->image);
            }
            $this->aboutusService->deleteAboutus($aboutus->id);
            DB::commit();
            return redirect()->route('aboutuses.index')->with('success', 'Aboutus deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting Aboutus. Please try again.');
        }
    }
    
}
