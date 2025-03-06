<?php
namespace App\Repositories;


use App\Models\Testimonial;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function all()
    {
        return Testimonial::orderBy('created_at','DESC')->get();
    }

    public function find($id)
    {
        return Testimonial::find($id);
    }

    public function create(array $data)
    {
        try {
        return Testimonial::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->update($data);
            return $testimonial;
        }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return null;
    }

    public function delete($id)
    {
        return Testimonial::destroy($id);
    }
}