<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit75a313f6e6a38e00c2459895858263d1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Cache\\' => 10,
        ),
        'B' => 
        array (
            'ByJG\\PHPThread\\' => 15,
            'ByJG\\Cache\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'ByJG\\PHPThread\\' => 
        array (
            0 => __DIR__ . '/..' . '/byjg/phpthread/src',
        ),
        'ByJG\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/byjg/cache-engine/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit75a313f6e6a38e00c2459895858263d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit75a313f6e6a38e00c2459895858263d1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
