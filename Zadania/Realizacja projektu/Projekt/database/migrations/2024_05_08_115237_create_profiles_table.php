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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subject_extended1_id')->constrained('subjects')->onDelete('restrict');
            $table->integer('hours_subject_extended1');
            $table->foreignId('subject_extended2_id')->constrained('subjects')->onDelete('restrict');
            $table->integer('hours_subject_extended2');
            $table->foreignId('subject_extended3_id')->constrained('subjects')->onDelete('restrict');
            $table->integer('hours_subject_extended3');
            $table->integer('number_of_seats')->default(1);
            $table->decimal('weight_math', 3, 2);
            $table->decimal('weight_polish_language', 3, 2);
            $table->decimal('weight_english_language', 3, 2);
            $table->decimal('weight_biology', 3, 2);
            $table->decimal('weight_chemistry', 3, 2);
            $table->decimal('weight_physics', 3, 2);
            $table->decimal('weight_geography', 3, 2);
            $table->decimal('weight_history', 3, 2);
            $table->decimal('entry_fee', 10, 2);
            $table->boolean('open_recruitment')->default(true);
            $table->string('image');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_number_of_seats CHECK (number_of_seats >= 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_math CHECK (weight_math BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_polish_language CHECK (weight_polish_language BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_english_language CHECK (weight_english_language BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_biology CHECK (weight_biology BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_chemistry CHECK (weight_chemistry BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_physics CHECK (weight_physics BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_geography CHECK (weight_geography BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_weight_history CHECK (weight_history BETWEEN 0 AND 1)');
        DB::statement('ALTER TABLE profiles ADD CONSTRAINT check_entry_fee CHECK (entry_fee >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['subject_extended1_id']);
            $table->dropForeign(['subject_extended2_id']);
            $table->dropForeign(['subject_extended3_id']);
        });
        Schema::dropIfExists('profiles');
    }
};
