<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign('appointment_id');
            $table->dropColumn('appointment_id');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->after('doctor_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id')->nullable()->after('id');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
    }
};
