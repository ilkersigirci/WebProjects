<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        /*'authManager'=>[
            'class'=>'yii\rbac\DbManager',
        ],*/
    ],
    'params' => $params,
    'controllerMap' => [
        'dump' => [
            'class' => 'hzhihua\dump\DumpController',
            'filePrefix' => '123456_654321',
            'tableOptions' => 'ENGINE=InnoDB CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci' , // for mysql < 5.7  'ENGINE=InnoDB CHARACTER SET=utf8 COLLATE=utf8_unicode_ci',
        ],
    ],
];
