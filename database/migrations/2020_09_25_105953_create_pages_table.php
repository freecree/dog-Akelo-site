<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('order_num')->nullable();
            $table->string('code', 10)->unique();
            $table->string('parent_code', 10)->default('root');
            $table->string('alias_of', 10)->nullable();
            $table->string('title', 255);
            $table->string('description', 2000)->nullable();
            $table->char('sex', 15)->nullable();
            $table->string('image_main', 20)->default('no-image.jpg');
            $table->string('images_big', 512)->default('no-image.jpg');
            $table->string('images_small', 512)->default('no-image.jpg');
            $table->dateTime('event_date')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
