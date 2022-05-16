<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prises', function (Blueprint $table) {
            $table->id();
            $table->string('clinique')->nullable();
            $table->string('type_operation')->nullable();
            $table->text('document')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('beneficiaire_id');
            $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');
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
        Schema::table('prises', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['beneficiaire_id']);
        });
        Schema::dropIfExists('prises');
    }
}
