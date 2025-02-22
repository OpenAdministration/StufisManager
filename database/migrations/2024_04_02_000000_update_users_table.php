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
            // redefined columns
            $table->string('email')->change();
            $table->string('password')->nullable()->change();
            // new columns
            $table->string('username');
            $table->string('provider');
            $table->string('provider_uid');
            $table->string('picture_url')->nullable();
            $table->string('iban')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('provider');
            $table->dropColumn('provider_uid');
            $table->dropColumn('picture_url');
            $table->dropColumn('iban');
            $table->dropColumn('address');
        });
    }
};
