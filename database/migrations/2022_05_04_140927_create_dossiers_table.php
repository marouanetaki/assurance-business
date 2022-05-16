<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->date('date_soins');
            $table->date('date_remboursement')->nullable();
            $table->integer('frais_remboursement')->default(0);
            $table->integer('frais_pharmacie')->default(0);
            $table->integer('frais_consultation')->default(0);
            $table->integer('frais_analyse')->default(0);
            $table->integer('total');
            $table->text('documents')->nullable();
            $table->string('statut')->default('En cours');
            $table->unsignedBigInteger('beneficiaire_id');
            $table->foreign('beneficiaire_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['beneficiaire_id']);
        });
        
        Schema::dropIfExists('dossiers');
    }
}
