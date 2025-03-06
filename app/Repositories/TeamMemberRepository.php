<?php
namespace App\Repositories;


use App\Models\TeamMember;

class TeamMemberRepository implements TeamMemberRepositoryInterface
{
    public function all()
    {
        return TeamMember::all();
    }

    public function find($id)
    {
        return TeamMember::find($id);
    }

    public function create(array $data)
    {
        try {
        return TeamMember::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
        $team = TeamMember::find($id);
        if ($team) {
            $team->update($data);
            return $team;
        }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return null;
    }

    public function delete($id)
    {
        return TeamMember::destroy($id);
    }
}