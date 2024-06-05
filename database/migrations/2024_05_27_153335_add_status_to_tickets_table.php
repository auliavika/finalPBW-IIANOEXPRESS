<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->enum('status', ['Pending ..', 'Sudah Bayar', 'Rejected'])->default('Pending ..');
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

