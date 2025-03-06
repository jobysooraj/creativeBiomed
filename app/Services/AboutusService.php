<?php
namespace App\Services;

use App\Repositories\AboutusRepositoryInterface;

class AboutusService
{
    protected $aboutusRepository;

    public function __construct(AboutusRepositoryInterface $aboutusRepository) // ✅ Use interface
    {
        $this->aboutusRepository = $aboutusRepository;
    }
    public function getAllAbouts()
    {
        return $this->aboutusRepository->all();
    }

    public function getAboutusById($id)
    {
        return $this->aboutusRepository->find($id);
    }

    public function createAboutus(array $data)
    {
      
        return $this->aboutusRepository->create($data);
    }

    public function updateAboutus($id, array $data)
    {
        return $this->aboutusRepository->update($id, $data);
    }

    public function deleteAboutus($id)
    {
        return $this->aboutusRepository->delete($id);
    }
}
