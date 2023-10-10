<?php

namespace App\Repositories\Company;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepositoryImplement extends Eloquent implements CompanyRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }
    
    /**
     * Get all company with their students
     *
     * @return Collection
     */
    public function AllWithUsers(): Collection
    {
        return $this->model->with('users')->get();
    }
    
    /**
     * Get specified company with their students
     *
     * @param  string $id
     * @return Company
     */
    public function CompanyWithUsers(string $id): Company
    {
        return $this->model->with('users')->findOrFail($id);
    }
}
