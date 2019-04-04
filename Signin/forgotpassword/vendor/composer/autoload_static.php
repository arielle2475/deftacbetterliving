<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1497f1b0dad4332608fd4bc7073434b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1497f1b0dad4332608fd4bc7073434b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1497f1b0dad4332608fd4bc7073434b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}