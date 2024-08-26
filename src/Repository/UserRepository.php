<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository {
    private $users = [];

    public function save(User $user): void {
        foreach ($this->users as $existingUser) {
            if ($existingUser->getEmail() === $user->getEmail()) {
                throw new \Exception('Email already exists.');
            }
        }
        $this->users[$user->getEmail()] = $user;
    }

    public function findByEmail(string $email): ?User {
        return $this->users[$email] ?? null;
    }

    public function update(User $user): void {
        if (!isset($this->users[$user->getEmail()])) {
            throw new \Exception('User not found.');
        }
        $this->users[$user->getEmail()] = $user;
    }

    public function delete(string $email): void {
        if (!isset($this->users[$email])) {
            throw new \Exception('User not found.');
        }
        unset($this->users[$email]);
    }
}
