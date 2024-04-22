<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mat_code')->nullable()->after('is_admin');
            $table->date('admission')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('ramal')->nullable();
            $table->unsignedBigInteger('branche_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();

            $table->foreign('branche_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mat_code');
            $table->dropColumn('admission');
            $table->dropColumn('birth_date');
            $table->dropColumn('ramal');
            $table->dropForeign(['branche_id']);
            $table->dropColumn('branche_id');
            $table->dropForeign(['position_id']);
            $table->dropColumn('position_id');
        });
    }
}
