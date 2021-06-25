<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            //$table->string('codigo');
            $table->string('descripcion');
            $table->integer('stock');
            $table->float('precio');
            $table->string('imagen')->nullable();
            $table->tinyInteger('consecionado')->nullable();
            $table->string('motivo')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');
            
            $table->foreign('categoria_id')
                    ->references('id')->on('categoria')
                    ->onDelete('set null');


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
        Schema::dropIfExists('productos');
    }
}
