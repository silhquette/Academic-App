<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Family\FamilyRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\ElectiveSubject\ElectiveSubjectRepository;

class SubjectController extends Controller
{
    protected $UserRepository;
    protected $ElectiveSubjectRepository;
    protected $FamilyRepository;

    public function __construct(UserRepository $UserRepository, ElectiveSubjectRepository $ElectiveSubjectRepository, FamilyRepository $FamilyRepository)
    {
      $this->UserRepository = $UserRepository;
      $this->FamilyRepository = $FamilyRepository;
      $this->ElectiveSubjectRepository = $ElectiveSubjectRepository;
    }

    public function index()
    {
        return view('subject.list', [
            'categories' => $this->ElectiveSubjectRepository->AllWithUsers(),
            'countSubjects' => count($this->ElectiveSubjectRepository->All()),
            'takenSubjects' => $this->UserRepository->TakenElevtiveSubject(request()->user()->id),
        ]);
    }

    public function show(string $id)
    {
        $family = $this->FamilyRepository->FamilyWithSubjects($id);

        return view('subject.show', [
            'family' => $family,
            'subjects' => $family->subjects,
            'students' =>  $this->UserRepository->CountStudents($family->subjects)
        ]);
    }
}
