<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrandLodgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grand_lodges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lodge_name')->nullable();
            $table->string('lodge_address')->nullable();
            $table->string('lodge_master')->nullable();
            $table->string('lodge_secretary')->nullable();
            $table->string('lodge_contact_number')->nullable();
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
        Schema::dropIfExists('grand_lodges');
    }
}
