<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('item',200)->nullable();
            $table->string('codigo',200)->nullable();
            $table->string('material',200)->nullable();
            $table->string('um',200)->nullable();
            $table->string('clasvalor',200)->nullable();
            $table->string('lote',200)->nullable();
            $table->string('almacen',200)->nullable();
            $table->string('ubicacion',200)->nullable();
            $table->decimal('stock',8,2)->nullable();
            $table->char('condicion',1)->default('N');
            $table->unsignedBigInteger('empresa_id');
            // $table->unsignedBigInteger('user_id');
            // // $table->foreign('user_id')
            // // ->references('id')
            // // ->on('users')
            // // ->onDelete('cascade')
            // // ->onUpdate('cascade');
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('sucursal_id');
            $table->foreign('sucursal_id')
            ->references('id')
            ->on('sucursals')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            // $table->timestamps();
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
