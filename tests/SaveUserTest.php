<?php

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Repository\UserRepository;
use App\UseCase\SaveUser;

class SaveUserTest extends TestCase {
    public function testSaveUser(): void {
        $userRepository = new UserRepository();
        $user = new User('test01', 'test01@example.com', 'password123');

        $saveUser = new SaveUser($userRepository);
        $saveUser->execute($user);

        $savedUser = $userRepository->findByEmail('test01@example.com');
        $this->assertEquals($user, $savedUser);
    }

    public function testSaveUserWithDuplicateEmail(): void {
        $userRepository = new UserRepository();
        $user1 = new User('test01', 'test01@example.com', 'password123');
        $user2 = new User('test02', 'test01@example.com', 'password456');
    
        $saveUser = new SaveUser($userRepository);
        $saveUser->execute($user1);
    
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Email already exists.');
        $saveUser->execute($user2);
    }
}
