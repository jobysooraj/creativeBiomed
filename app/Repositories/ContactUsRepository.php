<?php
namespace App\Repositories;


use App\Models\ContactUs;

class ContactUsRepository implements ContactUsRepositoryInterface
{
    public function all()
    {
        return ContactUs::all();
    }

    public function find($id)
    {
        return ContactUs::find($id);
    }

    public function create(array $data)
    {
        try {
        return ContactUs::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
        $contactus = ContactUs::find($id);
        if ($contactus) {
            $contactus->update($data);
            return $contactus;
        }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return null;
    }

    public function delete($id)
    {
        return ContactUs::destroy($id);
    }
}