<?php

namespace App\Repositories\Family;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Family;

class FamilyRepositoryImplement extends Eloquent implements FamilyRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Family $model)
    {
        $this->model = $model;
    }

    /**
     * get Family with 
     *
     * @param  String $id
     * @return Family
     */
    public function FamilyWithSubjects(String $id) : Family {
        return $this->model->with(['subjects', 'subjects.users'])->findOrFail($id);
    }
}
