<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HapusKolomMerekDariProduk extends Migration
{
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('merek');
        });
    }

    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('merek')->nullable();
        });
    }
}

