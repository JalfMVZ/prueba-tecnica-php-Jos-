<?php

namespace App\UseCase;

use App\Entity\User;
use App\Repository\UserRepository;

class SaveUser {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute(User $user): void {
        try {
            $this->userRepository->save($user);
        } catch (\Exception $e) {
            throw new \Exception('Failed to save user: ' . $e->getMessage());
        }
    }
}
