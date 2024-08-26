<?php

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserTest extends TestCase {
    public function testUserCreation(): void {
        $user = new User('test01', 'test01@example.com', 'password123');

        $this->assertEquals('test01', $user->getName());
        $this->assertEquals('test01@example.com', $user->getEmail());
        $this->assertEquals('password123', $user->getPassword());
    }

    public function testSetters(): void {
        $user = new User('test01', 'test01@example.com', 'password123');

        $user->setName('test02');
        $this->assertEquals('test02', $user->getName());

        $user->setEmail('test02@example.com');
        $this->assertEquals('test02@example.com', $user->getEmail());

        $user->setPassword('newpassword123');
        $this->assertEquals('newpassword123', $user->getPassword());
    }

    public function testInvalidName(): void {
        $this->expectException(\InvalidArgumentException::class);
        new User(' ', 'test01@example.com', 'password123');
    }

    public function testInvalidEmail(): void {
        $this->expectException(\InvalidArgumentException::class);
        new User('test01', 'invalid-email', 'password123');
    }

    public function testInvalidPassword(): void {
        $this->expectException(\InvalidArgumentException::class);
        new User('test01', 'test01@example.com', ' ');
    }
}
