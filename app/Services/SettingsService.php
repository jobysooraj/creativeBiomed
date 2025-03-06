<?php
namespace App\Services;

use App\Repositories\SettingsRepositoryInterface;

class SettingsService
{
    protected $settingsRepository;

    public function __construct(SettingsRepositoryInterface $settingsRepository) // ✅ Use interface
    {
        $this->settingsRepository = $settingsRepository;
    }
    public function getAllSettings()
    {
        return $this->settingsRepository->all();
    }

    public function getSettingsById($id)
    {
        return $this->settingsRepository->find($id);
    }

    public function createSettings(array $data)
    {
      
        return $this->settingsRepository->create($data);
    }

    public function updateSettings($id, array $data)
    {
        return $this->settingsRepository->update($id, $data);
    }

    public function deleteSettings($id)
    {
        return $this->settingsRepository->delete($id);
    }
}
