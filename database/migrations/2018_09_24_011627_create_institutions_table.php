<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('phone')->nullable();
            $table->string('country');
            $table->string('ador_one_name')->nullable();
            $table->string('ador_one_phone')->nullable();
            $table->string('ador_one_email')->nullable();
            $table->string('ador_two_name')->nullable();
            $table->string('ador_two_phone')->nullable();
            $table->string('ador_two_email')->nullable();
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
        Schema::dropIfExists('institutions');
    }
}
