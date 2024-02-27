<?php

it('can test', function () {
    expect(true)->toBeTrue();
});

it('loads routes', function () {

    require 'C:\DEV\Web\laravel-packages\adminify\stubs\app\Models\User.php';

    $user = App\Models\User::create([
        'name' => 'name',
        'email' => 'email@somewhere.com',
        'password' => \Illuminate\Support\Facades\Hash::make('123456789'),
    ]);

    $this->actingAs($user);
    $response = $this->get('/asdasd');
    expect($response->getStatusCode())->toBe(200);
});
