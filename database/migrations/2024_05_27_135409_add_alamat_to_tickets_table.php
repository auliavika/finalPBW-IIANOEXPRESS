<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('alamat')->nullable()->after('name');
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('alamat');
        });
    }
}
