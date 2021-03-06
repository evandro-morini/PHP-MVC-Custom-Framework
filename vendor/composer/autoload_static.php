<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7cf8e96223871aeb9d1f93b21c4da566
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\Model\\' => 16,
            'Framework\\Controller\\' => 21,
            'Framework\\Config\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Model',
        ),
        'Framework\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controller',
        ),
        'Framework\\Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Config',
        ),
    );

    public static $classMap = array (
        'Framework\\Config\\Dispatch' => __DIR__ . '/../..' . '/Config/Dispatch.php',
        'Framework\\Controller\\AdminController' => __DIR__ . '/../..' . '/Controller/AdminController.php',
        'Framework\\Controller\\ArticleController' => __DIR__ . '/../..' . '/Controller/ArticleController.php',
        'Framework\\Controller\\IndexController' => __DIR__ . '/../..' . '/Controller/IndexController.php',
        'Framework\\Controller\\LoginController' => __DIR__ . '/../..' . '/Controller/LoginController.php',
        'Framework\\Model\\Article' => __DIR__ . '/../..' . '/Model/Article.php',
        'Framework\\Model\\ArticleDAO' => __DIR__ . '/../..' . '/Model/ArticleDAO.php',
        'Framework\\Model\\Author' => __DIR__ . '/../..' . '/Model/Author.php',
        'Framework\\Model\\AuthorDAO' => __DIR__ . '/../..' . '/Model/AuthorDAO.php',
        'Framework\\Model\\Conn' => __DIR__ . '/../..' . '/Model/Conn.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7cf8e96223871aeb9d1f93b21c4da566::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7cf8e96223871aeb9d1f93b21c4da566::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7cf8e96223871aeb9d1f93b21c4da566::$classMap;

        }, null, ClassLoader::class);
    }
}
