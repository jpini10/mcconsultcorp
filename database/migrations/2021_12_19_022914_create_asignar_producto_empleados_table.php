<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarProductoEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('asignar_producto_empleados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('coteo',8,2)->nullable();
            $table->decimal('diferencias',8,2);
            $table->string('descripcion')->nullable();
            $table->string('foto')->nullable();
            $table->string('estado')->default('PENDIENTE');
            $table->unsignedBigInteger('lote_id');
            $table->foreign('lote_id')
            ->references('id')
            ->on('lotes_controllers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
            ->references('id')
            ->on('productos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('empresa_id');
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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('asignar_producto_empleados');
    }
}
