<?php
namespace App\Services;

use App\Repositories\ContactUsRepositoryInterface;

class ContactUsService
{
    protected $contactUsRepository;

    public function __construct(ContactUsRepositoryInterface $contactUsRepository) // ✅ Use interface
    {
        $this->contactUsRepository = $contactUsRepository;
    }
    public function getAllContactuses()
    {
        return $this->contactUsRepository->all();
    }

    public function getContactusById($id)
    {
        return $this->contactUsRepository->find($id);
    }

    public function createContact(array $data)
    {
      
        return $this->contactUsRepository->create($data);
    }

    public function updateContact($id, array $data)
    {
        return $this->contactUsRepository->update($id, $data);
    }

    public function deleteContact($id)
    {
        return $this->contactUsRepository->delete($id);
    }
}
