<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Синглтон приложения
 */
class Application
{
    /** @var ContainerBuilder */
    protected static $container;

    // Disable Class instance creation
    private function __construct(){}
    private function __clone(){}

    /**
     * @return ContainerBuilder
     */
    public static function getContainer()
    {
        if (! self::$container) {
            self::$container = self::loadContainer();
        }
        return self::$container;
    }

    /**
     * @return ContainerBuilder
     */
    protected static function loadContainer()
    {
        // Создаем контейнер DI и грузим сервисы из конфига
        $container = new ContainerBuilder();

        // TODO грузить _config/*.yml's динамически по всему дереву директорий

        $configPath = __DIR__.'/My/Task/Service/_config';
        $loader = new YamlFileLoader($container, new FileLocator($configPath));
        $handle = opendir($configPath);

        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'yml') {
                if (defined('DEV_ENV') && DEV_ENV) {
                    if (strpos($file, 'dev') === 0) {
                        $loader->load($file);
                    }
                }
                else {
                    if (strpos($file, 'prod') === 0) {
                        $loader->load($file);
                    }
                }
            }
        }
        closedir($handle);

        return $container;
    }
}
