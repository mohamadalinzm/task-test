<?php

namespace App\Actions\Auth;

use App\Http\Requests\API\V1\Auth\RegisterUserRequest;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Traits\NewStaticTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    use NewStaticTrait;

    public function run(RegisterUserRequest $request): User
    {
        $user = User::query()->create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password')),
        ]);

        $role = Role::query()->where('name', 'User')->first();
        $user->roles()->attach($role);

        event(new Registered($user));

        Auth::login($user);

        return $user;
    }
}
