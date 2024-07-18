<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('restrict');
            $table->date('date_of_submission');
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('restrict');
            $table->decimal('total_paid', 10, 2)->default(0);
            $table->decimal('point_score', 10, 2)->default(0);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE registrations ADD CONSTRAINT check_total_paid CHECK (total_paid >= 0)');
        DB::statement('ALTER TABLE registrations ADD CONSTRAINT check_point_score CHECK (point_score BETWEEN 0 AND 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropForeign(['profile_id']);
        });
        Schema::dropIfExists('registrations');
    }
};
