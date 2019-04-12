<?php
declare(strict_types=1);

use phpunit\Framework\TestCase;
require "../loader.php";

final class SendMailTest extends TestCase
{
    public function testCanCreateSendMailObject(): void
    {
        $this->assertInstanceOf(SendMail::class,new SendMail());
    }

    public function testCanSendMail():void{
        $e = new SendMail();
        $this->assertTrue($e->mailSend("gruppocasino@gmail.com","test","test"));
    }
}
?>