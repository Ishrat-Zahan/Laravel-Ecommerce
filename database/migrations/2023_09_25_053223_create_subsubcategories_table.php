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
        Schema::create('subsubcategories', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->bigInteger("category_id")->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade"); 

            $table->bigInteger("subcategory_id")->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete("cascade"); 

            $table->integer('priority')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsubcategories');
    }
};
