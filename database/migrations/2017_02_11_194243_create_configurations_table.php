<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('mondaySetting');
            $table->boolean('tuesdaySetting');
            $table->boolean('wednesdaySetting');
            $table->boolean('thursdaySetting');
            $table->boolean('fridaySetting');
            $table->boolean('saturdaySetting');
            $table->boolean('sundaySetting');

            $table->softDeletes();
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
        Schema::dropIfExists('configurations');
    }
}
