<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private Request $request;

    private User $user;

    public function setRequest($request): static
    {
        $this->request = $request;

        return $this;
    }

    public function setUser($user): static
    {
        $this->user = $user;

        return $this;
    }

    public function setRole(): static
    {
        $this->user->assignRole($this->request->role);

        return $this;
    }

    public function syncRoles(): static
    {
        $this->user->syncRoles($this->request->role);

        return $this;
    }

    public function setAvatar(): void
    {
        $this->user->saveMedia($this->request->input('profile_picture_url'));
    }

    public function createUser(): static
    {
        $this->user = User::create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'password' => Hash::make($this->request->password),
        ]);

        return $this;
    }

    public function updateUser(): static
    {
        $this->user->update(
            $this->request->only('name', 'email')
        );

        return $this;
    }
}
