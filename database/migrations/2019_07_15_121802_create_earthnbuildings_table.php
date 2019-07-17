<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarthnbuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earthnbuildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('region');
            $table->string('address');
            $table->string('building');
            $table->string('soil');
            $table->string('lat');
            $table->string('long');
            $table->string('information');
            $table->timestamps();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('earthnbuildings');
    }
}
