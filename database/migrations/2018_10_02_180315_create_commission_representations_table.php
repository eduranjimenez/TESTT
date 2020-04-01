<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionRepresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_representations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institutioncommission_id')->unsigned();
            $table->integer('representation_id')->unsigned();
            $table->integer('capacity');
            $table->timestamps();

            $table->foreign('representation_id')
                ->references('id')->on('representations')
                ->onDelete('cascade');

            $table->foreign('institutioncommission_id')
                ->references('id')->on('institution_commissions')
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
        Schema::dropIfExists('commission_representations');
    }
}
