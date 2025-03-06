<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PortfolioService;
use App\Http\Requests\PortfolioRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Portfolio;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class PortfolioController extends Controller
{
    use ImageUploadTrait;
    protected $portfolioService;
    protected $categoryService;

    public function __construct(PortfolioService $portfolioService,CategoryService $categoryService)
    {
        $this->portfolioService = $portfolioService;
        $this->categoryService = $categoryService;

    }

    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Portfolios', 'url' => route('portfolios.index')],
            ['name' => 'Lists', 'url' => null]
        ];

        if ($request->ajax()) {
            $portfolios = $this->portfolioService->getAllPortfolios();

            return DataTables::of($portfolios)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $imageUrl = asset('storage/'.$row->image);
                    return '<img src="'.$imageUrl.'" alt="Portfolio Image" width="50" height="50" />';
                })
                ->addColumn('category', function ($row) {
                    return $row->category->name ?? '';
                })
                ->addColumn('title', function ($row) {
                   
                    return $row->title;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('portfolios.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>
                            <form action="'.route('portfolios.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.portfolios.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Portfolios', 'url' => route('portfolios.index')],
            ['name' => 'Create', 'url' => null]
        ];
        $categories = $this->categoryService->getAllCategories();

        return view('admin.portfolios.create', compact('breadcrumbs','categories'));
    }

    public function store(PortfolioRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), 'portfolio');
            }

            $this->portfolioService->createPortfolio($data);

            DB::commit();
            return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error creating portfolio. Please try again.');
        }
    }

    public function edit(Portfolio $portfolio)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Portfolios', 'url' => route('portfolios.index')],
            ['name' => 'Edit', 'url' => null]
        ];
        $categories = $this->categoryService->getAllCategories();

        return view('admin.portfolios.edit', compact('portfolio', 'breadcrumbs','categories'));
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                if ($portfolio->image) {
                    Storage::disk('public')->delete($portfolio->image);
                }
                $data['image'] = $this->uploadImage($request->file('image'), 'portfolio');
            }

            $this->portfolioService->updatePortfolio($portfolio->id, $data);

            DB::commit();
            return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error updating portfolio. Please try again.');
        }
    }

    public function destroy(Portfolio $portfolio)
    {
        DB::beginTransaction();
        try {
            $this->portfolioService->deletePortfolio($portfolio->id);

            DB::commit();
            return redirect()->route('portfolios.index')->with('success', 'Portfolio deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting portfolio. Please try again.');
        }
    }
}
