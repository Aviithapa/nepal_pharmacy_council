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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('');
            $table->text('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('meta_link')->nullable();
            $table->string('meta_description')->nullable();
            $table->enum('type', ['homepage_banner', 'testimonial', 'content', 'news',  'services', 'team', 'pages', 'about', 'faq', 'gallery', 'bod', 'csr', 'clients','facility', 'blog', 'cpd'])->nullable();
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
