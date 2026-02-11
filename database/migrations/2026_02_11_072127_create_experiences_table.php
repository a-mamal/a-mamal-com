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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profile_id')
                ->constrained('profiles')
                ->onDelete('cascade');

            $table->foreignId('organization_id')
                ->constrained('organizations')
                ->onDelete('cascade');

            $table->string('role');

            // Dates nullable since people might not remember them
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->text('description')->nullable();
            $table->json('highlights')->nullable();

            $table->boolean('is_current')->default(false);

            $table->timestamps();            
        });

        // Current experience can't have end date
        // Add CHECK constraint using SQL
        DB::statement('ALTER TABLE experiences ADD CONSTRAINT chk_current_end CHECK ((is_current = 0) OR (end_date IS NULL))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE experiences DROP CHECK chk_current_end');

        Schema::dropIfExists('experiences');
    }
};
