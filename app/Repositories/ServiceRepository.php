<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function all()
    {
        return Service::with('category')->get();
    }

    public function find($slug)
    {
        return Service::where('slug', $slug)->firstOrFail();
    }
    public function create(array $data)
    {

        return Service::create($data);
    }

    public function update($id, array $data)
    {
        $service = Service::findOrFail($id);
        $service->update($data);
        return $service;
    }

    public function delete($id)
    {
        return Service::destroy($id);
    }
}
