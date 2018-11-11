<?php

namespace Afp\Shared\Factory;

class DaoFactoryFactory
{
    private static $settings;
    private static $container;

    public function __construct(\Slim\Container $c)
    {
        self::$settings = $c->get('settings');
        self::$container = $c;
    }

    public static function getFactory()
    {
        switch (self::$settings['DaoFactory']) {
            case 'FakerFactory':
                return new FakerFactory();
                break;
            case 'MySqlFactory':
                return new MySqlFactory(self::$container->get('mysql'));
                break;
            default:
                return new FakerFactory();
        }
    }
}
