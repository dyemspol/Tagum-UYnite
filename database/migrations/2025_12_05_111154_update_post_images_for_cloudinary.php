<?php

// database/migrations/..._update_post_images_for_cloudinary.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('post_images', function (Blueprint $table) {
            // Renaming the existing column to reflect it holds the CDN URL
            $table->renameColumn('post_image_path', 'cdn_url'); 
            
            // Add the public_id for management (deletion/transformation)
            $table->string('public_id')->after('report_id'); 
            
            // Add mime_type to distinguish between image/video
            $table->string('mime_type', 50)->after('public_id');
        });
    }

    public function down(): void
    {
        Schema::table('post_images', function (Blueprint $table) {
            $table->dropColumn(['public_id', 'mime_type']);
            $table->renameColumn('cdn_url', 'post_image_path');
        });
    }
};
