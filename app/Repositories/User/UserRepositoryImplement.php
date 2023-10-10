<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use LaravelEasyRepository\Implementations\Eloquent;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    /**
     * Get All users data with the subjects
     *
     * @return User
     */
    public function AllWithSubjects(): Collection
    {
        return $this->model->with('subjects')->orderBy('entry_year', 'DESC')->get();
    }
    
    /**
     * Get one user data with the subjects
     *
     * @param  mixed $id
     * @return User
     */
    public function UserWithSubjects(string $id)
    {
        return $this->model->with('subjects')->findOrFail($id);
    }

    /**
     * Get only selected elective subject by user
     *
     * @param  mixed $id
     * @return array
     */
    public function TakenElevtiveSubject(string $id): array
    {
        $user = $this->UserWithSubjects($id);
        $takenSubjects = [];

        foreach ($user->subjects as $subject) {
            $takenSubjects[] = $subject->name;
        }

        return $takenSubjects;
    }

    /**
     * Sync Elective Subject
     *
     * @param  mixed $request
     * @param  mixed $user_id
     * @return void
     */
    public function SyncSubject(Request $request, string $user_id)
    {
        return $this->model->findOrFail($user_id)->subjects()->sync($request->elective_subject);
    }
    
    /**
     * Count how many students in one subject's category
     *
     * @param  mixed $subjects
     * @return int
     */
    public function CountStudents(Collection $subjects): int {
        $students = 0;

        foreach ($subjects as $subject)
        {
            $students += count($subject->users);
        }

        return $students;
    }
}
