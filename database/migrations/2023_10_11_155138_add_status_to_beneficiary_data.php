<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBeneficiaryData extends Migration
{
    public function up()
    {
        Schema::table('beneficiary_data', function (Blueprint $table) {
            $table->enum('status', ["Pending", "Accepted","Cancel"])->default('Pending');
        });

         Schema::table('beneficiary_data', function (Blueprint $table) {
            $table->string('status', 255)->change(); 
        });
    }

    public function down()
    {
        Schema::table('beneficiary_data', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
