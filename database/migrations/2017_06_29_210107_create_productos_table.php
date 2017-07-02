<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcategoria')->references('id')->on('categoria');
            $table->integer('idmarca')->references('id')->on('marca');
            $table->string('codigo')->unique();
            $table->string('slug')->unique();
            $table->string('titulo')->unique();
            $table->mediumText('descripcion')->nullable();
            $table->decimal('precio_compra',5,2)->nullable();
            $table->decimal('precio_venta',5,2)->nullable();
            $table->integer('stock')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->mediumText('imagen1')->nullable();
            $table->mediumText('imagen2')->nullable();
            $table->mediumText('imagen3')->nullable();
            $table->mediumText('imagen4')->nullable();
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
        Schema::dropIfExists('producto');
    }
}
