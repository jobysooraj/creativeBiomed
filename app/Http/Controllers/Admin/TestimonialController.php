<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\Services\TestimonialService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class TestimonialController extends Controller
{
    protected $testimonialService;
    use ImageUploadTrait; 
    public function __construct(TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Testimonial', 'url' => route('testimonials.index')],
            ['name' => 'Lists', 'url' => null] // Null for the current page
            ];
            if ($request->ajax()) {
                $testimonials = $this->testimonialService->getAllTestimonials();
                
                return DataTables::of($testimonials)
                    ->addIndexColumn() // Adds an index column if needed
                    ->addColumn('image', function ($row) {
                        $imageUrl = asset('storage/'.$row->image); // Adjust path based on storage
                        return '<img src="'.$imageUrl.'" alt="Category Image" width="50" height="50" />';
                    })
                    ->addColumn('status', function ($row) {
                        if ($row->status === 'approved') {
                            return '<span class="badge bg-success">Approved</span>';
                        } elseif ($row->status === 'pending') {
                            return '<span class="badge bg-warning">Pending</span>';
                        } elseif ($row->status === 'rejected') {
                            return '<span class="badge bg-danger">Rejected</span>';
                        }
                    })
                    ->addColumn('action', function ($row) {
                        return '<a href="'.route('testimonials.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>
                                <form action="'.route('testimonials.destroy', $row->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                    })
                    ->rawColumns(['action','status','image']) // Allows HTML rendering in the action column
                    ->make(true);
            }
        return view('admin.testimonial.index',compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Testimonial', 'url' => route('testimonials.index')],
            ['name' => 'Create', 'url' => null] // Null for the current page
            ];
       return view('admin.testimonial.create',compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        
        $data = $request->validated(); // First, validate input
       
        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('image')) {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'testimonial');
                }
            }
           
            $this->testimonialService->createTestimonial($data);
            DB::commit(); // Commit transaction

            return redirect()->route('testimonials.index')->with('success', 'Your testimonial has been submitted!');
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
    public function edit(Testimonial $testimonial)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Testimonial', 'url' => route('testimonials.index')],
            ['name' => 'Edit', 'url' => null] // Null for the current page
        ];
      
        return view('admin.testimonial.edit', compact('testimonial','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated(); // Validate input
       
        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('image')) {
                if ($testimonial->image) {
                    Storage::disk('public')->delete($testimonial->image);
                }
                $data['image'] = $this->uploadImage($request->file('image'), 'testimonial');
            }
            $this->testimonialService->updateTestimonial($testimonial->id, $data);

            DB::commit(); 
            return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        DB::beginTransaction();
        try {
            $this->testimonialService->deleteTestimonial($testimonial->id);
            DB::commit();
            return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting Testimonial. Please try again.');
        }
    }
}
