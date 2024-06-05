<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToSchedulesTable extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('departure_time');
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}

