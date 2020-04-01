<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('category');
            $table->string('gender');
            $table->string('academic_level');
            $table->string('address');
            $table->date('date_birth');
            $table->string('cellphone')->nullable();
            $table->string('phone');
            $table->string('blood_type')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_cellphone')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_email')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_completed')->nullable()->default(false);
            $table->timestamps();
            
            $table->foreign('institution_id')
                ->references('id')->on('institutions')
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
        Schema::dropIfExists('participants');
    }
}
