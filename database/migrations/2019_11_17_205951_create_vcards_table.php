<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVCardPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('company', 255);
            $table->string('jobtitle', 255);
            $table->string('role', 255);
            $table->string('email', 255);
            $table->string('phonenumber', 255);
            $table->string('phonenumber_sec', 255);
            $table->string('address', 255);
            $table->string('label', 255);
            $table->string('url', 255);
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
        Schema::dropIfExists('vcards');
    }
}
