<?php
declare(strict_types=1);

use phpunit\Framework\TestCase;
include 'database.php';

final class DatabaseTestCase extends TestCase
{

    public function testDatabaseConnect(): void
    {
        $this->assertInstanceOf(Database::class,new Database("127.0.0.1",3306,"provaCasino","root","root"));
    }
    public function testCannotConnect(): void
    {
        $this->expectException(PDOException::class);
        $this->assertInstanceOf(Database::class,new Database("127.0.0.2",3306,"provaCasino","root","root"));
    }
    public function testInserUser() : void{
        $db = new Database("127.0.0.1",3306,"provaCasino","root","root");
        $lastId = $db->executeQuery("select max(id) from users")[0];
        $db->insertUser(new User(
            "Carlo",
            "Pezzotti",
            "2000-12-01",
            "Capolago",
            "Via laveggio",
            9,
            "0788159957",
            "carlo.pezzotti@samtrevano.ch",
            "male",
            "Password&1",
            "Password&1"
        ));
        $nowId = $db->executeQuery("select max(id) from users")[0];
        $this->assertTrue(($lastId+1 == $nowId));
    }

    public function testCannotInsertUser():void{
        $this->expectException(InvalidArgumentException::class);
        $db = new Database("127.0.0.1",3306,"provaCasino","root","root");
        $db->insertUser("prova");
    }
}
