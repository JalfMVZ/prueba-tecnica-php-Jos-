<?php

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Repository\UserRepository;

class UserRepositoryTest extends TestCase {
    public function testSaveAndFindUser(): void {
        $userRepository = new UserRepository();
        $user = new User('test01', 'test01@example.com', 'password123');

        $userRepository->save($user);
        $savedUser = $userRepository->findByEmail('test01@example.com');

        $this->assertEquals($user, $savedUser);
    }

    public function testUpdateUser(): void {
        $userRepository = new UserRepository();
        $user = new User('test01', 'test01@example.com', 'password123');

        $userRepository->save($user);
        $user->setName('test02');
        $userRepository->update($user);
        $updatedUser = $userRepository->findByEmail('test01@example.com');

        $this->assertEquals('test02', $updatedUser->getName());
    }

    public function testDeleteUser(): void {
        $userRepository = new UserRepository();
        $user = new User('test01', 'test01@example.com', 'password123');

        $userRepository->save($user);
        $userRepository->delete('test01@example.com');
        $deletedUser = $userRepository->findByEmail('test01@example.com');

        $this->assertNull($deletedUser);
    }

    public function testDuplicateEmail(): void {
        $userRepository = new UserRepository();
        $user1 = new User('test01', 'test01@example.com', 'password123');
        $user2 = new User('test02', 'test01@example.com', 'password456');
    
        $userRepository->save($user1);
    
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Email already exists.');
        $userRepository->save($user2);
    }
}
