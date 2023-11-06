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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->text('description')->default('');
            $table->string('product_type', 20);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->unsignedBigInteger('subsubcategory_id')->nullable();
            $table->foreign('subsubcategory_id')->references('id')->on('subsubcategories');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('sku')->unique();
            $table->string('unit');
            $table->string('color')->nullable();
            $table->string('attributes', 255)->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->string('tax_model');
            $table->decimal('discount', 10, 2);
            $table->string('discount_type');
            $table->integer('total_quantity');
            $table->integer('minimum_quantity');
            $table->decimal('shipping_cost', 10, 2);
            $table->tinyInteger("featured")->unsigned()->default(0);
            $table->string('search_tags')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
        


       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
