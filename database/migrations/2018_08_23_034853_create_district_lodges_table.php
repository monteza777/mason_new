<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictLodgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_lodges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grand_lodge_id');
            $table->string('lodge_name');
            $table->string('lodge_address');
            $table->string('lodge_master');
            $table->string('lodge_secretary');
            $table->string('lodge_contact_number');
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
        Schema::dropIfExists('district_lodges');
    }
}
