<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeatCapacityToSchedulesTable extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->integer('seat_capacity')->after('departure_time');
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('seat_capacity');
        });
    }
}
