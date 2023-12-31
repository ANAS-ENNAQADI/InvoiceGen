<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb04eabb7cc6398501ea36ae5c21e96a
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb04eabb7cc6398501ea36ae5c21e96a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb04eabb7cc6398501ea36ae5c21e96a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteb04eabb7cc6398501ea36ae5c21e96a::$classMap;

        }, null, ClassLoader::class);
    }
}
