<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faults', function (Blueprint $table) {
            if (!Schema::hasColumn('faults', 'is_common')){
                $table->tinyInteger('is_common')->default(0)->after('description');
            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faults', function (Blueprint $table) {
            $table->dropColumn(['is_common']);
        });
    }
}
