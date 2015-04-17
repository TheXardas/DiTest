<?php

namespace My\Task\Service\Db;

use My\Task\Service\I\DbAccessor;

class Oracle implements DbAccessor
{

	/**
	 * Вытащить данные из базы
	 *
	 * @param string $Name
	 *
	 * @return mixed
	 * @throws \SqlException
	 */
	public function get($Name) {
		// todo implement
	}

	/**
	 * Вставить данные в базу
	 *
	 * @param string $Name
	 * @param string $Val
	 * @return mixed
	 * @throws \SqlException
	 */
	public function set($Name, $Val) {
		// todo implement
	}

}