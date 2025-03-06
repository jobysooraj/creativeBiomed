<?php 
namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository implements PortfolioRepositoryInterface
{
    public function all()
    {
        return Portfolio::with('category')->get();
    }

    public function find($id)
    {
        return Portfolio::findOrFail($id);
    }

    public function create(array $data)
    {
        return Portfolio::create($data);
    }

    public function update($id, array $data)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($data);
        return $portfolio;
    }

    public function delete($id)
    {
        return Portfolio::destroy($id);
    }
}
