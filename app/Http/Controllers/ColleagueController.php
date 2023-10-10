<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\User\UserRepository;
use App\Repositories\ElectiveSubject\ElectiveSubjectRepository;

class ColleagueController extends Controller
{
    protected $UserRepository;
    protected $ElectiveSubjectRepository;

    public function __construct(UserRepository $UserRepository, ElectiveSubjectRepository $ElectiveSubjectRepository)
    {
      $this->UserRepository = $UserRepository;
      $this->ElectiveSubjectRepository = $ElectiveSubjectRepository;
    }
    
    /**
     * get all user with their elective subjects
     *
     * @return void
     */
    public function index()
    {
        return view('colleague.list', [
            'users' => $this->UserRepository->AllWithSubjects() 
        ]);
    }
    
    /**
     * Get spesific one user
     *
     * @param  mixed $user
     * @return void
     */
    public function show(String $id)
    {
        return view('colleague.show', [
            'user' => $this->UserRepository->UserWithSubjects($id),
            'takenSubjects' => $this->UserRepository->TakenElevtiveSubject($id),
            'subjects' => $this->ElectiveSubjectRepository->All(),
            'show' => true,
        ]); 
    }
    
    /**
     * Sync user and their elective subject
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->UserRepository->SyncSubject($request, request()->user()->id);

        return Redirect::route('profile.edit')->with('status', 'subject-sync');
    }
}
 