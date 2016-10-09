<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTrainingProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("account_id")->unsigned();
            $table->enum("setting_learning_style", ["SELF", "SEMINAR"]);
            $table->time("setting_default_availability_start")->nullable();
            $table->time("setting_default_availability_finish")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_profile');
    }
}
