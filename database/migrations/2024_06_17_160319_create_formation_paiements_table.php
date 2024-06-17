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
        Schema::create('formation_paiements', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_code');
            $table->string('mode');
            $table->float('amount');
            $table->string('devise')->default('USD');
            $table->string('status')->default('actif');
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
        Schema::dropIfExists('formation_paiements');
    }
};
