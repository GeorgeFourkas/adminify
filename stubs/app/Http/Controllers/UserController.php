<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Requests\User\CreateUserModelRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdateUsersPasswordRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\Multilingual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Multilingual;

    public function create()
    {
        $this->authorize('create', Auth::user());

        return view('admin.users.create');
    }

    public function store(CreateUserModelRequest $request, UserService $service)
    {
        $service
            ->setRequest($request)
            ->createUser()
            ->setRole()
            ->setAvatar();

        return redirect()
            ->route('users')
            ->with('success', __('User created successfully'));

    }

    public function edit(User $user)
    {
        $this->authorize('update', \Auth::user());

        return view('admin.users.edit', [
            'user' => $user->load(['roles' => function ($query) {
                $query
                    ->select('name')
                    ->first();
            }]),
            'locales' => $this->getAllDeclaredLanguages(),
        ]);
    }

    public function passwordUpdate(UpdateUsersPasswordRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('users', $request->user())
            ->with('success', __("Successfully updates user's password"));
    }

    public function update(User $user, UpdateUserRequest $request, UserService $service)
    {
        $service
            ->setUser($user)
            ->setRequest($request)
            ->updateUser()
            ->syncRoles()
            ->setAvatar();

        return redirect()
            ->route('users')
            ->with('success', __('User Updated Successfully'));
    }

    public function destroy(DeleteUserRequest $request, User $user)
    {
        $user->delete();

        return redirect()
            ->route('users')
            ->with('success', __('User Deleted Successfully '));
    }
}
