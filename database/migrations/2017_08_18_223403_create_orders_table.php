<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('startDate');// fecha del pedido
            $table->string('search'); // palabra de busqueda
            $table->integer('id_item'); // llave foranea item
            $table->integer('typeItem');// tipo de item (1,2,3,4)
            $table->boolean('place');// tipo lugar (0 = sala,1 = domicilio)
            $table->integer('id_user');//llave foranea usuario
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
        Schema::dropIfExists('orders');
    }
}
