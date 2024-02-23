<?php

namespace App\Mail\Models;

class ContactMailModel
{
    protected ?string $firstName;

    protected ?string $lastName;

    protected ?string $email;

    protected ?string $phone;

    protected ?string $msg;

    public function __construct(array $data)
    {
        $this->firstName = $data['first_name'] ?? '-';
        $this->lastName = $data['last_name'] ?? '-';
        $this->email = $data['email'] ?? '-';
        $this->phone = $data['phone'] ?? '-';
        $this->msg = $data['message'] ?? '-';
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getMsg(): ?string
    {
        return $this->msg;
    }
}
