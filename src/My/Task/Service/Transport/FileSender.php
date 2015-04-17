<?php

namespace My\Task\Service\Transport;

use My\Task\Service\I\Transport;

/**
 * Отправщик писем в файловую систему (заглушка для тестов)
 * @package My\Task\Service\Transport
 */
class FileSender implements Transport
{

	/** @var string Куда класть файлы с письмами */
	protected $mailDir;

	/**
	 * @param string $mailDir
	 */
	public function __construct($mailDir)
	{
		$this->mailDir = ROOT_PATH.'/'.rtrim($mailDir, '/');
	}

	/**
	 * Отправить сообщение
	 *
	 * @param $To Кому
	 * @param $Subject На какую тему
	 * @param $Content Что
	 * @param $From От кого
	 * @param array $AdditionalHeaders дополнительные заголовки
	 * @return bool
	 * @throws \MailException
	 */
	public function send($To, $Subject, $Content, $From, $AdditionalHeaders = [])
	{
		$filename = $this->getFileName();
		$data = $this->getContent($To, $Subject, $Content, $From, $AdditionalHeaders);
		$result = file_put_contents($filename, $data);
		if ($result === false) {
			// todo детали ошибки
			throw new MailException('Failed to write file!');
		}
	}

	/**
	 * @return string
	 */
	protected function getFileName()
	{
		return $this->mailDir.'/'.date('Ymd').'.log';
	}

	/**
	 * @param $To
	 * @param $Subject
	 * @param $Content
	 * @param $From
	 * @param $AdditionalHeaders
	 * @return string
	 */
	protected function getContent($To, $Subject, $Content, $From, $AdditionalHeaders)
	{
		$AdditionalHeaders = print_r($AdditionalHeaders, true);
		$output = <<<CONTENT
To: $To
From: $From
Subject: $Subject
AddHeaders:
----
$AdditionalHeaders
----
Content:
$Content

CONTENT;
		return $output;
	}

}