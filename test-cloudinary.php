<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Testing cloudinary() helper..." . PHP_EOL;
    $result = cloudinary()->upload(public_path('img/LOGO.png'), [
        'folder' => 'test-upload'
    ]);
    
    echo "✅ SUCCESS: " . $result->getSecurePath() . PHP_EOL;
} catch (\Exception $e) {
    echo "❌ ERROR: " . $e->getMessage() . PHP_EOL;
    echo "Stack trace:" . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
}
