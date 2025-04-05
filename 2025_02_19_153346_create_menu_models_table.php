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
        if (!Schema::hasTable('menu_table')) { // Check if table exists
       Schema::create('menu_table', function(Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->string('title');
        $table->longText('Description');
        $table->string('Price');
        $table->string('Quantity');
        $table->string('image');
        $table->string('gallery_image')->nullable();
        $table->timestamps();

       });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_table');
    }
};
