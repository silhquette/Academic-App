<?php

namespace App\Repositories\Family;

use App\Models\Family;
use LaravelEasyRepository\Repository;

interface FamilyRepository extends Repository{
    
    /**
     * get Family with 
     *
     * @param  String $id
     * @return Family
     */
    public function FamilyWithSubjects(String $id) : Family;
}
