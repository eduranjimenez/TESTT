<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commission_id')->unsigned();
            $table->integer('capacity');
            $table->text('countries');
            $table->timestamps();

            $table->foreign('commission_id')
                ->references('id')->on('commissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_commissions');
    }
}
