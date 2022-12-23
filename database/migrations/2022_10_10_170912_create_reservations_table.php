<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('date');
            $table->time('heure')->nullable();
            $table->integer("tarification_id")->unsigned();
            $table->integer("customer_id")->unsigned();
            $table->integer("owner_id")->unsigned();
            $table->integer("appartement_id")->unsigned();
            $table->dateTime("date_debut")->nullable();
            $table->dateTime("date_fin")->nullable();
            $table->integer("note")->unsigned();
            $table->string('ref')->default('res'. uniqid());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
