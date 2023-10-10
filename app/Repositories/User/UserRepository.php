<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository extends Repository{

    /**
     * Get All users data with the subjects
     *
     * @return User
     */
    public function AllWithSubjects(): Collection;
    
    /**
     * Get one user data with the subjects
     *
     * @param  mixed $user
     * @return User
     */
    public function UserWithSubjects(string $id);
    
    /**
     * Get only selected elective subject by user
     *
     * @param  mixed $id
     * @return array
     */
    public function TakenElevtiveSubject(string $id): array;
    
    /**
     * Sync Elective Subject
     *
     * @param  mixed $request
     * @param  mixed $user_id
     * @return void
     */
    public function SyncSubject(Request $request, string $user_id);

    /**
     * Count how many students in one subject's category
     *
     * @param  mixed $subjects
     * @return int
     */
    public function CountStudents(Collection $subjects): int;
}
