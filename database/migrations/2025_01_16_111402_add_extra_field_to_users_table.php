<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('remember_token')->nullable();
            $table->string('mobile')->after('address')->nullable();
            $table->string('gender')->after('mobile')->nullable();
            $table->enum('user_type',['Super_Admin','Admin','Customer'])->default('Admin')->after('gender')->nullable();
            $table->enum('status',['Active','Pending','Suspend','Approved'])->default('Active')->after('user_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
