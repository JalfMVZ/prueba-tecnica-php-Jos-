<?php

namespace App\Entity;

class User {
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        if (trim($name) === '') {
            throw new \InvalidArgumentException('Name cannot be empty or only whitespace.');
        }
        $this->name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        if (trim($email) === '') {
            throw new \InvalidArgumentException('Email cannot be empty or only whitespace.');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email format.');
        }
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        if (trim($password) === '') {
            throw new \InvalidArgumentException('Password cannot be empty or only whitespace.');
        }
        $this->password = $password;
    }
}
