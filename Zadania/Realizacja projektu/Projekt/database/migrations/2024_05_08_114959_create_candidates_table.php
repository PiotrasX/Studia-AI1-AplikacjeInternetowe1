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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('photo');
            $table->decimal('account_balance', 10, 2)->default(0);
            $table->integer('result_math')->default(0);
            $table->integer('result_polish_language')->default(0);
            $table->integer('result_english_language')->default(0);
            $table->string('name_fourth_subject');
            $table->integer('result_fourth_subject')->default(0);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE candidates ADD CONSTRAINT check_account_balance CHECK (account_balance >= 0)');
        DB::statement('ALTER TABLE candidates ADD CONSTRAINT check_result_math CHECK (result_math BETWEEN 0 AND 100)');
        DB::statement('ALTER TABLE candidates ADD CONSTRAINT check_result_polish_language CHECK (result_polish_language BETWEEN 0 AND 100)');
        DB::statement('ALTER TABLE candidates ADD CONSTRAINT check_result_english_language CHECK (result_english_language BETWEEN 0 AND 100)');
        DB::statement('ALTER TABLE candidates ADD CONSTRAINT check_result_fourth_subject CHECK (result_fourth_subject BETWEEN 0 AND 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('candidates');
    }
};
