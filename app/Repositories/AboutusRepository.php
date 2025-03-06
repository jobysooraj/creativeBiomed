<?php
namespace App\Repositories;


use App\Models\Aboutus;

class AboutusRepository implements AboutusRepositoryInterface
{
    public function all()
    {
        return Aboutus::all();
    }

    public function find($id)
    {
        return Aboutus::find($id);
    }

    public function create(array $data)
    {
        try {
        return Aboutus::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
        $aboutus = Aboutus::find($id);
        if ($aboutus) {
            $aboutus->update($data);
            return $aboutus;
        }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return null;
    }

    public function delete($id)
    {
        return Aboutus::destroy($id);
    }
}