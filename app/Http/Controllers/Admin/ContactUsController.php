<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Services\ContactUsService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    protected $contactUsService;

    public function __construct(ContactUsService $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Contact Us', 'url' => route('contactuses.index')],
            ['name' => 'Lists', 'url' => null] // Null for the current page
            ];
            $teams = $this->contactUsService->getAllContactuses();
            if ($request->ajax()) {
              
                
                return DataTables::of($teams)
                    ->addIndexColumn() 
                  
                    ->addColumn('action', function ($row) {
                       
                        return '
                                <form action="'.route('contactuses.destroy', $row->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                    })
                    ->rawColumns(['action']) // Allows HTML rendering in the action column
                    ->make(true);
            }
        return view('admin.contactus.index',compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactUsRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $this->contactUsService->createContact($data);

            DB::commit();
            return redirect()->back()->with('success', 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->withErrors('Error creating Message sending. Please try again.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $contactUs = ContactUs::findOrFail($id);
            
            $this->contactUsService->deleteContact($contactUs->id);
            DB::commit();
            return redirect()->route('contactuses.index')->with('success', 'Contact Us deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting Contact Us. Please try again.');
        }
    }
}
