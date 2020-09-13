<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vote_id');
            $table->unsignedBigInteger('identifierable_id');
            $table->string('identifierable_type');
            $table->timestamps();

            $table->foreign('vote_id')
                ->references('id')
                ->on('votes')
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
        Schema::dropIfExists('identifiers');
    }
}
