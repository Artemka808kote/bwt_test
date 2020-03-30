<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaa5e6ff889ed84676225197e339aa9c1
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DiDom\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DiDom\\' => 
        array (
            0 => __DIR__ . '/..' . '/imangazaliev/didom/src/DiDom',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaa5e6ff889ed84676225197e339aa9c1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaa5e6ff889ed84676225197e339aa9c1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
