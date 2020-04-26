<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->longText('title');
            $table->longText('subtitle');
            $table->longText('content_raw');
            $table->longText('content_html');
            $table->string('item_image');
            $table->string('item_image_large');
            $table->boolean('project_link_enabled')->default(0);
            $table->string('project_link');
            $table->longText('meta_description');
            $table->boolean('enabled')->default(0);
            $table->integer('sort_order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_items');
    }
}
