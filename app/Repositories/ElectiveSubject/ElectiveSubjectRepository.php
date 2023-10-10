<?php

namespace App\Repositories\ElectiveSubject;

use LaravelEasyRepository\Repository;

interface electiveSubjectRepository extends Repository{

    /**
     * Get All subjects data with the users
     *
     * @return User
     */
    public function AllWithUsers();
    
    /**
     * Get one subjects data with the user
     *
     * @param  mixed $id
     * @return void
     */
    public function SubjectsWithUser(string $id);
}
