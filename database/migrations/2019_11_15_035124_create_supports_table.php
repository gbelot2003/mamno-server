<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('support_id');
            $table->integer('support_user_id');
            $table->string('title', 100);
            $table->string('description', 2000);
            $table->dateTimeTz('support_dateTime');
            $table->string('solution', 2000)->nullable();
            $table->integer('solution_user_id')->nullable();
            $table->dateTimeTz('solution_dateTime')->nullable();
            $table->integer('support_type_id')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('supports');
    }
}
