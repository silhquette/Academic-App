<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Contracts\View\View;

class InternshipController extends Controller
{
    protected $CompanyRepository;

    public function __construct(CompanyRepository $CompanyRepository)
    {
      $this->CompanyRepository = $CompanyRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        return view('company.list', [
            'companies' => $this->CompanyRepository->AllWithUsers(),
        ]);
    }
    
    /**
     * Display specific internship data
     *
     * @param  String $id
     * @return void
     */
    public function show(string $id)
    {
        return view('company.show', [
            'company' => $this->CompanyRepository->CompanyWithUsers($id),
        ]);
    }

    public function update(string $id)
    {
        return true;
    }
}
