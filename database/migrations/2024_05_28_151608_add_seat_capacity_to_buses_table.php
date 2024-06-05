<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('buses', function (Blueprint $table) {
            $table->unsignedInteger('seat_capacity')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('buses', function (Blueprint $table) {
            $table->dropColumn('seat_capacity');
        });
    }
    
};
