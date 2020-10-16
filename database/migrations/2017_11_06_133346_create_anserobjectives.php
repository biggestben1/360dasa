<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnserobjectives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('answerobjectives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->smallInteger('phonenumber');
            $table->string('email');
            $table->longText('description');
            $table->integer('objectives_id')->unsigned();
            $table->foreign('objectives_id')->references('id')->on('objectives');
            $table->rememberToken();
            $table->timestamps();
        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
