<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbcontactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */
    protected $casts = [
        'options' => 'array',
    ];
    public function up()
    {
        Schema::create('dbcontacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('dbcontact');
    }
}
