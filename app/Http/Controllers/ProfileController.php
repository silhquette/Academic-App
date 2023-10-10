<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\User\UserRepository;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\ElectiveSubject\ElectiveSubjectRepository;

class ProfileController extends Controller
{
    protected $UserRepository;
    protected $ElectiveSubjectRepository;

    public function __construct(UserRepository $UserRepository, ElectiveSubjectRepository $ElectiveSubjectRepository)
    {
      $this->UserRepository = $UserRepository;
      $this->ElectiveSubjectRepository = $ElectiveSubjectRepository;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'takenSubjects' => $this->UserRepository->TakenElevtiveSubject($request->user()->id),
            'subjects' => $this->ElectiveSubjectRepository->All(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
