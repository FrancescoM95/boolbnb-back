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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->tinyInteger('baths');
            $table->tinyInteger('beds');
            $table->tinyInteger('rooms');
            $table->smallInteger('square_meters')->unsigned();
            $table->string('address');
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();
            $table->string('cover_image');
            $table->boolean('is_visible')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
