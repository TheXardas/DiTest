<?php

namespace My\Task\Service\Transport;

use My\Task\Service\I\Transport;

/**
 * Нормальный отправщик писем
 *
 * @todo допилить
 * @package My\Task\Service\Transport
 */
class MailSender implements Transport
{

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
		$result = mail($To, $Subject, $Content, $AdditionalHeaders);
		if (!$result) {
			// todo детали ошибки
			throw new MailException('Failed to send mail!');
		}
	}

}