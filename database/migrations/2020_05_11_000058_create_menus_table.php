<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('menu_id');

            $table->integer('tacos_id')->unsigned();
            $table->foreign('tacos_id')
                ->references('tacos_id')
                ->on('tacos')
                ->onDelete('cascade');

            $table->integer('drink_id')->unsigned();
            $table->foreign('drink_id')
                ->references('drink_id')
                ->on('drinks')
                ->onDelete('cascade');
            $table->float('menu_price')->unsigned();
            $table->boolean('with_frite')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
