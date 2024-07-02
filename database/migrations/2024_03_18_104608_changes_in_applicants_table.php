<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropColumn('referral');
            $table->dropColumn('university');
            $table->dropColumn('address');
            $table->string('state')->nullable();
            $table->string('street')->nullable();
            $table->string('country')->nullable();
            $table->string('linkedin_url')->nullable()->change();
            $table->string('github_url')->nullable()->change();
            $table->renameColumn('name', 'first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
        });
    }


    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('referral')->nullable();
            $table->string('university')->nullable();
            $table->string('address')->nullable();
            $table->dropColumn('state');
            $table->dropColumn('street');
            $table->dropColumn('country');
            $table->string('linkedin_url')->nullable(false)->change();
            $table->string('github_url')->nullable(false)->change();
            $table->renameColumn('first_name', 'name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
        });
    }
};
