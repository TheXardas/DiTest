<?php

namespace My\Task\Service\I;

/**
 * Интерфейс отправщика (транспорта) сообщений
 */
interface Transport
{

	/**
	 * Отправить сообщение
	 *
	 * @param string $To Кому
	 * @param string $Subject На какую тему
	 * @param string $Content Что
	 * @param string $From От кого
	 * @param array $AdditionalHeaders дополнительные заголовки
	 * @return bool
	 * @throws \MailException
	 */
	public function send($To, $Subject, $Content, $From, $AdditionalHeaders = []);

	// TOOD write other methods
}