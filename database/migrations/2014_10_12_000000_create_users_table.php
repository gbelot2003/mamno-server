<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('telefono');
            $table->smallInteger('departamento_id');
            $table->smallInteger('municipio_id');
            $table->string('calle');
            $table->string('casa');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();

            $table->string('identidad')->nullable();
            $table->string('rtn')->nullable();
            $table->string('rtn_image')->nullable();
            $table->integer('grupo_id')->nullable();
            $table->string('cuenta_image')->nullable();
            $table->text('descripcion_vehiculos')->nullable();
            $table->string('contrato')->nullable();
            $table->string('acuerdo')->nullable();
            $table->dateTime('fvencimiento')->nullable();
            $table->dateTime('fautorizacion')->nullable();

            $table->boolean('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
