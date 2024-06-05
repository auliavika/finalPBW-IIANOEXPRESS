<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->decimal('total_price', 8, 2)->after('seat');
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('total_price');
        });
    }
}

