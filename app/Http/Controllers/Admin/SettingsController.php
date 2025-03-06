<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\Services\SettingsService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class SettingsController extends Controller
{
    use ImageUploadTrait;  // Use the trait here

    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Settings', 'url' => route('settings.index')],
            ['name' => 'Lists', 'url' => null] // Null for the current page
            ];
            $settings = $this->settingsService->getAllSettings();
            $SettingsCount=$settings->count();
            if ($request->ajax()) {
              
                
                return DataTables::of($settings)
                    ->addIndexColumn() 
                    ->addColumn('logo_image', function ($row) {
                        $imageUrl = asset('storage/'.$row->logo_image); // Adjust path based on storage
                        return '<img src="'.$imageUrl.'" alt="About us Image" width="50" height="50" />';
                    })
                    ->addColumn('description', function ($row) {                     
                        return $row->description;
                    })
                    ->addColumn('action', function ($row) {
                        return '<a href="'.route('settings.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>
                                <form action="'.route('settings.destroy', $row->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                    })
                    ->rawColumns(['action','logo_image']) // Allows HTML rendering in the action column
                    ->make(true);
            }
        return view('admin.settings.index',compact('breadcrumbs','SettingsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Settings', 'url' => route('settings.index')],
            ['name' => 'Create', 'url' => null] // Null for the current page
            ];
       return view('admin.settings.create',compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingsRequest $request)
    {
        $data = $request->validated(); // First, validate input

        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('logo_image')) {
                if ($request->hasFile('logo_image')) {
                    $data['logo_image'] = $this->uploadImage($request->file('logo_image'), 'logo');
                }
            }
        
            $this->settingsService->createSettings($data);

            DB::commit(); // Commit transaction

            return redirect()->route('settings.index')->with('success', 'Your Settings has been submitted!');
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
    public function edit(Setting $setting)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Settings', 'url' => route('settings.index')],
            ['name' => 'Edit', 'url' => null] // Null for the current page
        ];
      
        return view('admin.settings.edit', compact('setting','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingsRequest $request, Setting $setting)
    {
        $data = $request->validated(); // Validate input
    
        DB::beginTransaction(); // Start transaction
    
        try {
            if ($request->hasFile('logo_image')) {
                if ($setting->logo_image) {
                    Storage::disk('public')->delete($setting->logo_image);
                }
                // Correct file handling
                $data['logo_image'] = $request->file('logo_image')->store('logos', 'public');
            }
    
            if (!$setting->id) {
                return redirect()->back()->with('error', 'Invalid setting ID.');
            }
    
            $this->settingsService->updateSettings($setting->id, $data);
    
            DB::commit(); 
            return redirect()->route('settings.index')->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        DB::beginTransaction();
        try {
            if ($setting->logo_image) {
                $this->deleteImage($setting->logo_image);
            }
            $this->settingsService->deleteSettings($setting->id);
            DB::commit();
            return redirect()->route('settings.index')->with('success', 'Settings deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting Settings. Please try again.');
        }
    }
}
