<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelineItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeline_items', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->boolean('enabled')->default(0);
            $table->unsignedBigInteger('type_id')->index();
            $table->foreign('type_id')->references('id')->on('timeline_types')->onDelete('cascade');
            $table->integer('sort_order');
            $table->string('icon');
            $table->string('dates');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('text')->nullable();
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
        Schema::dropIfExists('timeline_items');
    }
}
