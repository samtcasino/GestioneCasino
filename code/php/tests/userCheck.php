<?php
declare(strict_types=1);

use phpunit\Framework\TestCase;
include '../user/user.php';

final class UserTestCase extends TestCase
{

    public function testCanCreateNewUser(): void
    {
        $this->assertInstanceOf(User::class,new User(
			"Carlo",
			"Pezzotti",
			"2000-12-01",
			"Capolago",
            6825,
			"Via laveggio",
			9,
			"0788159957",
			"carlo.pezzotti@samtrevano.ch",
			"male",
			"Password&1",
			"Password&1"
		));
    }

    public function testCannotCreateAWrongUser():void{
    	$this->expectException(InvalidArgumentException::class);
    	$u = new User(
			"23423432423234",
			"Pezzotti",
			"2018-12-01",
			"Capolago",
            6825,
			"Via laveggio",
			9,
			"0788159957",
			"carlo.pezzotti@samtrevano.ch",
			"male",
			"Password&1",
			"Password&1"
		);
    }

    public function testValidMail():void
    {
    	$email = "carlo.pezzotti@samtrevano.ch";
    	$this->assertSame($email,User::tryEmail($email));
    }

    public function testNotValidMail():void
    {
    	$this->expectException(InvalidArgumentException::class);
    	$email = "carlo.pezzottisamtrevano.ch";
    	$this->assertSame($email,User::tryEmail($email));
    }


    public function testValidName():void{
    	$name = "Carlo";
    	$this->assertSame($name,User::tryName($name));
    }
    public function testNotValidName():void{
    	$this->expectException(InvalidArgumentException::class);
    	$name = "234234qwe232";
    	$this->assertSame($name,User::tryName($name));
    }

    public function testLogicalAge():void{
    	$date = "2001-12-01";
    	$this->assertSame(17,User::getAge($date));
    }

    public function testValidDate():void{
    	$date = "2000-12-01";
    	$this->assertSame($date,User::tryDate($date));
    }

    public function testNotValidDate():void{
    	$this->expectException(InvalidArgumentException::class);
    	$date = "2001-12-01";
    	$this->assertSame($date,User::tryDate($date));
    }


    public function testValidHouseNumber():void{
    	$houseNumber = 9;
    	$this->assertSame($houseNumber,User::tryHouseNumber($houseNumber));
    }

    public function testNotValidHouseNumber():void{
    	$this->expectException(InvalidArgumentException::class);
    	$houseNumber = "4fwws2";
    	$this->assertSame($houseNumber,User::tryHouseNumber($houseNumber));
    }


    public function testValidTelephoneNumber():void{
    	$number = "078-815-99-57";
    	$this->assertSame($number,User::tryNumber($number));
    	$number = "0788159957";
    	$this->assertSame($number,User::tryNumber($number));
    }

    public function testNotValidTelephoneNumber():void{
    	$this->expectException(InvalidArgumentException::class);
    	$number = "078-815-99-5234w7";
    	$this->assertSame($number,User::tryNumber($number));
    }


    public function testValidGender():void{
    	$gender = "male";
    	$this->assertSame($gender,User::tryGender($gender));
    	$gender = "female";
    	$this->assertSame($gender,User::tryGender($gender));
    }

    public function testNotValidGender():void{
    	$this->expectException(InvalidArgumentException::class);
    	$gender = "other";
    	$this->assertSame($gender,User::tryGender($gender));
    }
}
