<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedDefaultValueForPajakPerBulanAndPotensiPajakPerBulanColumnsInTaxpayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taxpayers', function (Blueprint $table) {
            $table->integer('pajak_per_bulan')->default(0)->nullable()->change();
            $table->integer('potensi_pajak_per_bulan')->default(0)->nullable()->change();
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
            $table->integer('pajak_per_bulan')->nullable()->change();
            $table->integer('potensi_pajak_per_bulan')->nullable()->change();
        });
    }
}
