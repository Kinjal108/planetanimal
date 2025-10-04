<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */
    'dir' => ['storage'],

    /*
    |--------------------------------------------------------------------------
    | Filesystem disks (Flysytem)
    |--------------------------------------------------------------------------
    |
    | Define an array of Filesystem disks, which use Flysystem.
    | You can set extra options, example:
    |
    | 'my-disk' => [
    |        'URL' => url('to/disk'),
    |        'alias' => 'Local storage',
    |    ]
    */
    'disks' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    */

    'route' => [
        'prefix' => 'elfinder',
        'middleware' => array('web', 'auth'), //Set to null to disable middleware filter
    ],

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots'=> [
        [
            'driver' => 'LocalFileSystem',
            'path'   => public_path('upload'),   // root folder in public
            'URL'    => env('APP_URL') . '/upload', // public URL
            'alias'  => 'upload', 
            // 'driver' => 'LocalFileSystem',
            // 'path'   => public_path('upload/Site_A1b2C3d4E5f6G7h8I9J0KLMNOPQRSTU'),  // real folder
            // 'URL'    => env('APP_URL') . '/upload/Site_A1b2C3d4E5f6G7h8I9J0KLMNOPQRSTU', // public URL
            // 'alias'  => 'My Uploads',   // name shown in elFinder
            // 'driver' => 'LocalFileSystem',
            // 'path'   => public_path('storage'),   // actual folder
            // 'URL'    => env('APP_URL') . '/storage',            // public URL
            // 'alias'  => 'Storage',                // name shown in elFinder
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    */

    'options' => array(),
    
    /*
    |--------------------------------------------------------------------------
    | Root Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with every root by default.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1#root-options
    |
    */
    'root_options' => array(
         'uploadMaxSize' => '5120M',
        'uploadDeny'    => array('all'),
        'uploadAllow'   => array('image', 'video','text/plain','text/xml','application/x-subrip'),
    ),

);
