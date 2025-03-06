<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait;  
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Categories', 'url' => route('categories.index')],
            ['name' => 'Lists', 'url' => null] // Null for the current page
        ];
        if ($request->ajax()) {
            $categories = $this->categoryService->getAllCategories();

            return DataTables::of($categories)
                ->addIndexColumn() // Adds an index column if needed
                ->addColumn('image', function ($row) {
                    $imageUrl = asset('storage/'.$row->image); // Adjust path based on storage
                    return '<img src="'.$imageUrl.'" alt="Category Image" width="50" height="50" />';
                })
             
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('categories.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>
                            <form action="'.route('categories.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                })
                ->rawColumns(['action','image']) // Allows HTML rendering in the action column
                ->make(true);
        }

        return view('admin.categories.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Categories', 'url' => route('categories.index')],
            ['name' => 'Create', 'url' => null] // Null for the current page
        ];
        return view('admin.categories.create', compact('breadcrumbs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'category');
                }
            }

            $this->categoryService->createCategory($data);

            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category Created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error creating category. Please try again.');
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
    public function edit(ServiceCategory $category)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Categories', 'url' => route('categories.index')],
            ['name' => 'Edit', 'url' => null] // Null for the current page
        ];
        return view('admin.categories.edit', compact('category','breadcrumbs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, ServiceCategory $category)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }
                $data['image'] = $this->uploadImage($request->file('image'), 'category');
            }
        
            $this->categoryService->updateCategory($category->id, $data);

            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error updating category. Please try again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $category)
    {
        DB::beginTransaction();
        try {
            $this->categoryService->deleteCategory($category->id);

            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category deletion failed: ' . $e->getMessage());
            return redirect()->back()->withErrors('Error deleting category. Please try again.');
        }

    }
   
}
