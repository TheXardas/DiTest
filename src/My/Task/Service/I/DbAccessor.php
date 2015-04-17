<?php

namespace My\Task\Service\I;

/**
 * Интерфейс класса доступа к хранилищу данных
 */
interface DbAccessor
{
    /**
     * Вытащить данные из базы
     *
     * @param string $Name
     *
     * @return mixed
     * @throws \SqlException
     */
    public function get($Name);

    /**
     * Вставить данные в базу
     *
     * @param string $Name
     * @param string $Val
     * @return mixed
     * @throws \SqlException
     */
    public function set($Name, $Val);

    // TOOD write other methods
}