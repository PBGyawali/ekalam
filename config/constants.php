<?php
return [
    'states'=>array(
        'all' => 'All State News',
        'state1' => 'State 1',
        'state2' => 'State 2',
        'state3' => 'Bagmati',
        'state4' => 'Gandaki',
        'state5' => 'Lumbini',
        'state6' => 'Karnali',
        'state7' => 'Sudur Paschim',
    ),    
    'allowed_images'=>array("jpg", "jpeg", "png", "gif", "bmp"),
    'asset_url' => env('APP_URL').'/public',
    'storage_url' => env('APP_URL').'/storage/app/public',
    'storage_path' => storage_path('/app/public/'),
];
