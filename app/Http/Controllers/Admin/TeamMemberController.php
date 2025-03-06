<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeamMemberRequest;
use App\Services\TeamMemberService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class TeamMemberController extends Controller
{
    use ImageUploadTrait;
    protected $teamMemberService;

    public function __construct(TeamMemberService $teamMemberService)
    {
        $this->teamMemberService = $teamMemberService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Team Members', 'url' => route('teams.index')],
            ['name' => 'Lists', 'url' => null] // Null for the current page
            ];
            $teams = $this->teamMemberService->getAllTeams();
            if ($request->ajax()) {
              
                
                return DataTables::of($teams)
                    ->addIndexColumn() 
                    ->addColumn('image', function ($row) {
                        $imageUrl = asset('storage/'.$row->image); // Adjust path based on storage
                        return '<img src="'.$imageUrl.'" alt="Profile Image" width="50" height="50" />';
                    })
                   
                    ->addColumn('action', function ($row) {
                       
                        return '<a href="'.route('teams.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>
                                <form action="'.route('teams.destroy', $row->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>';
                    })
                    ->rawColumns(['action','image','description']) // Allows HTML rendering in the action column
                    ->make(true);
            }
        return view('admin.team.index',compact('breadcrumbs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Team Member', 'url' => route('teams.index')],
            ['name' => 'Create', 'url' => null] // Null for the current page
            ];
       return view('admin.team.create',compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMemberRequest $request)
    {
        $data = $request->validated(); // First, validate input

        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('image')) {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->uploadImage($request->file('image'), 'team');
                }
            }
        
            $this->teamMemberService->createTeam($data);

            DB::commit(); // Commit transaction

            return redirect()->route('teams.index')->with('success', 'Your Member has been submitted!');
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
    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
      
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('admin.home')],
            ['name' => 'Team Member', 'url' => route('teams.index')],
            ['name' => 'Edit', 'url' => null] // Null for the current page
        ];
      
        return view('admin.team.edit', compact('teamMember','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamMemberRequest $request, $id)
    {
        $data = $request->validated(); // Validate input
        $teamMember = TeamMember::findOrFail($id);
       
        DB::beginTransaction(); // Start transaction

        try {
            if ($request->hasFile('image')) {
                if ($teamMember->image) {
                    Storage::disk('public')->delete($teamMember->image);
                }
                $data['image'] = $this->uploadImage($request->file('image'), 'team');
            }
            $this->teamMemberService->updateTeam($teamMember->id, $data);

            DB::commit(); 
            return redirect()->route('teams.index')->with('success', 'Team Member updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $teamMember = TeamMember::findOrFail($id);
            if ($teamMember->image) {
                $this->deleteImage($teamMember->image);
            }
            $this->teamMemberService->deleteTeam($teamMember->id);
            DB::commit();
            return redirect()->route('teams.index')->with('success', 'Team Member deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error deleting Team Member. Please try again.');
        }
    }
}
