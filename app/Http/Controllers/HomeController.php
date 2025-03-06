<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PortfolioService;
use App\Services\CategoryService;
use App\Services\ServicesService;
use App\Services\TestimonialService;
use App\Services\TeamMemberService;
use App\Services\SettingsService;
use App\Services\AboutusService;

class HomeController extends Controller
{
    protected $serviceService;
    protected $categoryService;
    protected $portfolioService;
    protected $testimonialService;
    protected $teamMemberService;
    protected $settingsService;
    protected $aboutusService;


    public function __construct(ServicesService $serviceService,AboutusService $aboutusService,SettingsService $settingsService,TeamMemberService $teamMemberService,CategoryService $categoryService,TestimonialService $testimonialService,PortfolioService $portfolioService)
    {
        $this->serviceService = $serviceService;
        $this->categoryService = $categoryService;
        $this->portfolioService = $portfolioService;
        $this->testimonialService = $testimonialService;
        $this->teamMemberService = $teamMemberService;
        $this->settingsService = $settingsService;
        $this->aboutusService = $aboutusService;

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = $this->serviceService->getAllServices();
        $categories = $this->categoryService->getAllCategories();
        $portfolios = $this->portfolioService->getAllPortfolios();
        $testimonials = $this->testimonialService->getAllTestimonials();
        $teams = $this->teamMemberService->getAllTeams();
        // $settings = $this->settingsService->getAllSettings();


        return view('website.home', compact('services', 'categories', 'portfolios','testimonials','teams'));
    }
    public function about(Request $request)
    {
        $aboutuses = $this->aboutusService->getAllAbouts();
        // $settings = $this->settingsService->getAllSettings();
        return view('website.about',compact('aboutuses'));
    }
    public function services(Request $request,$id)
    {
        
         $services = $this->serviceService->getAllServices();
         $serviceById = $this->serviceService->getServiceById($id);
         
        //  $settings = $this->settingsService->getAllSettings();
        return view('website.service',compact('services','serviceById'));
    }

    
}
