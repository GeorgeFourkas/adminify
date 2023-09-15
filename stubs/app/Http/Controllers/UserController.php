<?php

namespace App\Http\Controllers\Admin\Adminify;


use App\Http\Requests\Admin\Adminify\User\CreateUserModelRequest;
use App\Http\Requests\Admin\Adminify\User\DeleteUserRequest;
use App\Http\Requests\Admin\Adminify\User\UpdateUserRequest;
use App\Http\Requests\Admin\Adminify\User\UpdateUsersPasswordRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\Multilingual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


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
            ->with('success', __('adminify.user_create'));

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
            ->with('success', __('adminify.user_password_update'));
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
            ->with('success', __('adminify.user_update'));
    }

    public function destroy(DeleteUserRequest $request, User $user)
    {
        $user->delete();

        return redirect()
            ->route('users')
            ->with('success', __('adminify.user_delete'));
    }
}
