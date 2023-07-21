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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse');
            $table->string('email');
            $table->string('image')->nullable();
            $table->integer('competence_id')->unsigned()->index();
            $table->integer('role_id')->unsigned()->index();
            $table->integer('etude_id')->unsigned()->index();
            $table->integer('autre_competence_id')->unsigned()->index();
            $table->integer('lien_personnel_id')->unsigned()->index();
            $table->integer('formation_id')->unsigned()->index();
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
        Schema::dropIfExists('membres');
    }
};
