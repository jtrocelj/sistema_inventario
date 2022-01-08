<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenominacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denominacions', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['BILLETE','MONEDA','OTRO'])->default('BILLETE');
            $table->float('valor',255);
            $table->string('image',100)->nullable();
           
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
        Schema::dropIfExists('denominacions');
    }
}
