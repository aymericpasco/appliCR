<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersToVisitReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visit_reports', function (Blueprint $table) {
            $table->unsignedInteger('visitor_id');
            $table->foreign('visitor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_reports', function (Blueprint $table) {
            $table->dropForeign('visit_reports_visitor_id_foreign');
        });
    }
}
