<?php

it('can test', function () {
    expect(true)->toBeTrue();
});


it('finds login', function () {
    $response = $this->get('/login');

    expect($response->status())->toBe(200);
});
