<?php
declare(strict_types=1);

use phpunit\Framework\TestCase;
include 'email.php';

final class EmailTest extends TestCase
{

    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(Email::class,new Email("usernamegmail.com"));
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Email::fromString('username@gmail.com');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}


