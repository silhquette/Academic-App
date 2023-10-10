<?php

namespace App\Repositories\Company;

use App\Models\Company;
use LaravelEasyRepository\Repository;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepository extends Repository{

    /**
     * Get all company with their students
     *
     * @return Collection
     */
    public function AllWithUsers(): Collection;

    /**
     * Get specified company with their students
     *
     * @param  string $id
     * @return Company
     */
    public function CompanyWithUsers(string $id): Company;
}
