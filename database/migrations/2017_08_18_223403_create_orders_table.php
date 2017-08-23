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
            $table->integer('typeItem');// tipo de item (1,2,3,4)
            $table->boolean('place');// tipo lugar (0 = sala,1 = domicilio)
            $table->integer('id_user');//llave foranea usuario
            $table->integer('id_copy');//llave foranea copia
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
