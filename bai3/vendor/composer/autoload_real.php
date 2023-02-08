<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit21ddb28a337fd8b48aa9048ecc6f52bc
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit21ddb28a337fd8b48aa9048ecc6f52bc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit21ddb28a337fd8b48aa9048ecc6f52bc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit21ddb28a337fd8b48aa9048ecc6f52bc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
