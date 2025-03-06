<?php
namespace App\Services;

use App\Repositories\TeamMemberRepositoryInterface;

class TeamMemberService
{
    protected $teamMemberRepository;

    public function __construct(TeamMemberRepositoryInterface $teamMemberRepository) // ✅ Use interface
    {
        $this->teamMemberRepository = $teamMemberRepository;
    }
    public function getAllTeams()
    {
        return $this->teamMemberRepository->all();
    }

    public function getTeamById($id)
    {
        return $this->teamMemberRepository->find($id);
    }

    public function createTeam(array $data)
    {
      
        return $this->teamMemberRepository->create($data);
    }

    public function updateTeam($id, array $data)
    {
        return $this->teamMemberRepository->update($id, $data);
    }

    public function deleteTeam($id)
    {
        return $this->teamMemberRepository->delete($id);
    }
}
