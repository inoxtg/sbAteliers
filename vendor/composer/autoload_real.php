<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6f3387aa2d9e3b7e7c7f1bc5029fe57b
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

        spl_autoload_register(array('ComposerAutoloaderInit6f3387aa2d9e3b7e7c7f1bc5029fe57b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6f3387aa2d9e3b7e7c7f1bc5029fe57b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6f3387aa2d9e3b7e7c7f1bc5029fe57b::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit6f3387aa2d9e3b7e7c7f1bc5029fe57b::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire6f3387aa2d9e3b7e7c7f1bc5029fe57b($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire6f3387aa2d9e3b7e7c7f1bc5029fe57b($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
