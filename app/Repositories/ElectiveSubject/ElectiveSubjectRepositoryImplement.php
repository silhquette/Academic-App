<?php

namespace App\Repositories\ElectiveSubject;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ElectiveSubject;

class ElectiveSubjectRepositoryImplement extends Eloquent implements ElectiveSubjectRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(ElectiveSubject $model)
    {
        $this->model = $model;
    }

    /**
     * Get All subjects data with the users
     *
     * @return ElectiveSubject
     */
    public function AllWithUsers()
    {
        return $this->model->with('users')->with('family')->get()->groupBy('family_id');
    }
    
    /**
     * Get one subjects data with the user
     *
     * @param  mixed $id
     * @return ElectiveSubject
     */
    public function SubjectsWithUser(string $id)
    {
        return $this->model->with('users')->findOrFail($id)->get();
    }
}
