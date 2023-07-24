<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->bigInteger('companyUserId', true);
            $table->bigInteger('companyId'); // this is NOT NULL
            $table->string('firstName', 100);
            $table->string('lastName', 100);
            $table->string('email')->unique('email');
        });
        
        DB::statement('ALTER TABLE `company_user`
            ADD COLUMN `passwordHash` BINARY(32) NOT NULL');
        
        DB::statement('ALTER TABLE `company_user`
            ADD FOREIGN KEY (`companyId`) REFERENCES `company`(`companyId`) ON DELETE CASCADE');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_user');
    }
};
