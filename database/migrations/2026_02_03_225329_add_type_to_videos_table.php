<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('type')->default('url')->after('description'); // 'url' or 'upload'
            $table->string('video_url')->nullable()->change(); // Allow null if uploading (though we'll use this for path too)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->string('video_url')->nullable(false)->change();
        });
    }
};
