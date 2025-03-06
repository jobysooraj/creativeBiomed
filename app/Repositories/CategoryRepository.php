<?php
namespace App\Repositories;

use App\Models\ServiceCategory;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return ServiceCategory::all();
    }

    public function find($id)
    {
        return ServiceCategory::findOrFail($id);
    }

    public function create(array $data)
    {
        
        return ServiceCategory::create($data);
    }

    public function update($id, array $data)
    {
        
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return ServiceCategory::destroy($id);
    }
}

