<?php

namespace App\Services;

use App\Repositories\PortfolioRepositoryInterface;

class PortfolioService
{
    protected $portfolioRepository;

    public function __construct(PortfolioRepositoryInterface $portfolioRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
    }

    public function getAllPortfolios()
    {
        return $this->portfolioRepository->all();
    }

    public function getPortfolioById($id)
    {
        return $this->portfolioRepository->find($id);
    }

    public function createPortfolio(array $data)
    {
        return $this->portfolioRepository->create($data);
    }

    public function updatePortfolio($id, array $data)
    {
        return $this->portfolioRepository->update($id, $data);
    }

    public function deletePortfolio($id)
    {
        return $this->portfolioRepository->delete($id);
    }
}
