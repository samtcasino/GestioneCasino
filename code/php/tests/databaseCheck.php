<?php
declare(strict_types=1);

use phpunit\Framework\TestCase;
require "../loader.php";

final class DatabaseTestCase extends TestCase
{

    public function testDatabaseConnect(): void
    {
        $this->assertInstanceOf(Database::class,new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018"));
    }
    public function testCannotConnect(): void
    {
        $this->expectException(PDOException::class);
        $this->assertInstanceOf(Database::class,new Database("127.0.0.1",3306,"cashyland","root","Casin02018"));
    }
    public function testInsertUser() : void{
        $db = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018");
        $db->insertUser(new User(
            "Carlo",
            "Pezzotti",
            "2000-12-01",
            "Capolago",
            6825,
            "Via laveggio",
            9,
            "0788159957",
            "a@a.ch",
            "male",
            "Password&1"
        ));
	    $result = $db->executeQueryWithoutFetch("select email from user where email = 'a@a.ch'")->fetch()["email"];
        $this->assertTrue($result == "a@a.ch");
	    $db->executeQuery("delete from user where email = 'a@a.ch'");
    }

    public function testCannotInsertUser():void{
        $this->expectException(InvalidArgumentException::class);
        $db = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018");
        $db->insertUser("prova");
    }

    public function testCorrectReturn():void{
        $db = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018"); 
        $result = $db->executeQueryWithoutFetch("select email,name from user where email = 'admin'")->fetch();
        $this->assertTrue(($result["email"] == "admin" && $result["name"] == "admin"));
    }

    public function testNotCorrectReturn():void{
        $db = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018"); 
        $result = $db->executeQueryWithoutFetch("select email,name from user where email = 'admin@admin.ch'")->fetch();
        $this->assertTrue(!($result["email"] == "adm@admin.ch" && $result["name"] == "ain"));
    }

    public function testExecuteNotCorrectQuery(){
        $db = new Database("127.0.0.1",3306,"cashyland","casinoAdmin","Casin02018"); 
        $this->expectException(InvalidArgumentException::class);
        $db->executeQueryWithoutFetch("select * from users");
    }
}
