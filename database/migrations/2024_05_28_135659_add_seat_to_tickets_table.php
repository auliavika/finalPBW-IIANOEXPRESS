<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeatToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('seat')->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('seat');
        });
    }
}

