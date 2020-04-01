<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantRepresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_representations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commissionrepresentation_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->timestamps();

            $table->foreign('commissionrepresentation_id')
                ->references('id')->on('commission_representations')
                ->onDelete('cascade');

            $table->foreign('participant_id')
                ->references('id')->on('participants')
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
        Schema::dropIfExists('participant_representations');
    }
}
