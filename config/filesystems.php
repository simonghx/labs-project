<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'editeurs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/editeurs/'),
            'url' => env('APP_URL').'/storage/editeurs/',
            'visibility' => 'public',
        ],
        'editeursThumbs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/editeurs/thumbs/'),
            'url' => env('APP_URL').'/storage/editeurs/thumbs/',
            'visibility' => 'public',
        ],
        'editeursMini' => [
            'driver' => 'local',
            'root' => storage_path('app/public/editeurs/miniature/'),
            'url' => env('APP_URL').'/storage/editeurs/miniature/',
            'visibility' => 'public',
        ],
        'articles' => [
            'driver' => 'local',
            'root' => storage_path('app/public/articles/'),
            'url' => env('APP_URL').'/storage/articles/',
            'visibility' => 'public',
        ],
        'articlesThumbs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/articles/thumbs/'),
            'url' => env('APP_URL').'/storage/articles/thumbs/',
            'visibility' => 'public',
        ],
        'carousel' => [
            'driver' => 'local',
            'root' => storage_path('app/public/carousel/'),
            'url' => env('APP_URL').'/storage/carousel/',
            'visibility' => 'public',
        ],
        'projets' => [
            'driver' => 'local',
            'root' => storage_path('app/public/projets/'),
            'url' => env('APP_URL').'/storage/projets/',
            'visibility' => 'public',
        ],
        'projetsThumbs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/projets/thumb/'),
            'url' => env('APP_URL').'/storage/projets/thumb/',
            'visibility' => 'public',
        ],
        'clients' => [
            'driver' => 'local',
            'root' => storage_path('app/public/clients/'),
            'url' => env('APP_URL').'/storage/clients/',
            'visibility' => 'public',
        ],
        'clientsMini' => [
            'driver' => 'local',
            'root' => storage_path('app/public/clients/miniatures/'),
            'url' => env('APP_URL').'/storage/clients/miniatures/',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

    ],

];
