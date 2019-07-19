<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DroppingAndReaddingLatAndLongColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taxpayers', function (Blueprint $table) {
            $table->dropColumn('long');
            $table->dropColumn('lat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taxpayers', function (Blueprint $table) {
            
        });
    }
}
