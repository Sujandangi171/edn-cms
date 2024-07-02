<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    // public function up(): void
    // {
    //     Schema::table('applicants', function (Blueprint $table) {
    //         $table->renameColumn('name', 'full_name');
    //         $table->foreignId('university_id')->nullable()->constrained()->onDelete('set null');
    //         $table->string('other_university_title')->nullable();
    //         $table->boolean('is_agreed');
    //         $table->string('heard_about_us');
    //     });

    //     // If there's existing data in the column, specify the conversion using the USING clause
    //     DB::statement('ALTER TABLE applicants ALTER COLUMN full_name TYPE JSON USING full_name::JSON');
    // }

    // public function down(): void
    // {
    //     // Revert the data type change
    //     DB::statement('ALTER TABLE applicants ALTER COLUMN full_name TYPE VARCHAR(255)');

    //     Schema::table('applicants', function (Blueprint $table) {
    //         // Revert the column name back to 'name'
    //         $table->renameColumn('full_name', 'name');
    //     });
    // }
};
