<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0);
            $table->unsignedBigInteger('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('counter_types')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->integer('number')->nullable();
            $table->integer('increment')->nullable();
            $table->string('icon');
            $table->longText('link')->nullable();
            $table->string('vendor')->nullable();
            $table->string('repository')->nullable();
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
        Schema::dropIfExists('counter_items');
    }
}
