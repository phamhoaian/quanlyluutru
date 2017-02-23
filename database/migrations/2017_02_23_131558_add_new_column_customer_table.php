<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function(Blueprint $table){
            $table->string('address')->nullable()->change();
            $table->string('id_card', 12)->nullable()->change();
            $table->string('nationality')->after('sex')->nullable();
            $table->string('passport')->after('nationality')->nullable();
            $table->string('passport_info')->after('passport')->nullable();
            $table->datetime('date_entry')->after('passport_info')->nullable();
            $table->string('port_entry')->after('date_entry')->nullable();
            $table->string('purpose_entry')->after('port_entry')->nullable();
            $table->datetime('permitted_start')->after('purpose_entry')->nullable();
            $table->datetime('permitted_end')->after('permitted_start')->nullable();
            $table->boolean('foreign_flg')->default('0')->after('permitted_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function(Blueprint $table){
            $table->dropColumn(['nationality', 'passport', 'passport_info', 'date_entry', 'port_entry', 'purpose_entry', 'permitted_start', 'permitted_end', 'foreign_flg']);
        });
    }
}
