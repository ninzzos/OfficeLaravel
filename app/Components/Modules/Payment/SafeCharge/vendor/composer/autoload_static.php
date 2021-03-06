<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8fbfbacb6ccad51040af9618bcf4f99e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SafeCharge\\Api\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SafeCharge\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/safecharge-international/safecharge-php/src/SafeCharge/Api',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8fbfbacb6ccad51040af9618bcf4f99e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8fbfbacb6ccad51040af9618bcf4f99e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
