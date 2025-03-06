<?php
namespace App\Services;

use App\Repositories\TestimonialRepositoryInterface;

class TestimonialService
{
    protected $testimonialRepository;

    public function __construct(TestimonialRepositoryInterface $testimonialRepository) // ✅ Use interface
    {
        $this->testimonialRepository = $testimonialRepository;
    }
    public function getAllTestimonials()
    {
        return $this->testimonialRepository->all();
    }

    public function getTestimonialById($id)
    {
        return $this->testimonialRepository->find($id);
    }

    public function createTestimonial(array $data)
    {
      
        return $this->testimonialRepository->create($data);
    }

    public function updateTestimonial($id, array $data)
    {
        return $this->testimonialRepository->update($id, $data);
    }

    public function deleteTestimonial($id)
    {
        return $this->testimonialRepository->delete($id);
    }
}
