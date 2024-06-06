<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('produks', function (Blueprint $table) {
        $table->integer('stok')->default(0); // or any other appropriate data type and default value
    });
}

public function down()
{
    Schema::table('produks', function (Blueprint $table) {
        $table->dropColumn('stok');
    });
}

};
