<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->tinyInteger('gender')->nullable();
            $table->string('email');
            $table->string('postcode', 8);
            $table->string('address');
            $table->string('building_name')->nullable();
            $table->text('opinion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('opinions');
    }
}