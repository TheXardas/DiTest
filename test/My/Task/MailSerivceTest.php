<?php


/**
 * Тестируем сервис почтовой отправки
 *
 * @todo write other tests!
 */
class MailServiceTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests Mail Sender Service
     */
    public function testMailService()
    {
        /** @var My\Task\Service\I\Transport $mailSender */
        $mailSender = Application::getContainer()->get('app.mail_sender');
        $mailSender->send('to', 'subject', 'content', 'from', ['additional' => 'headers']);

        $expected = <<<CONTENT
To: to
From: from
Subject: subject
AddHeaders:
----
Array
(
    [additional] => headers
)

----
Content:
content

CONTENT;
        $this->assertEquals($expected, file_get_contents(ROOT_PATH.'/mail/'.date('Ymd').'.log'));
    }

}