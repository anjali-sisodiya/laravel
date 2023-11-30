<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ujwala_scheme_details', function (Blueprint $table) {
        $table->enum('status', ["Pending", "Accepted","Cancel"])->default('Pending');
        });

         Schema::table('beneficiary_data', function (Blueprint $table) {
            $table->string('status', 255)->change(); // Adjust the length as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ujwala_scheme_details', function (Blueprint $table) {
         $table->dropColumn('status');

        });
    }
};
