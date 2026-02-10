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
        //Rename table
        Schema::rename('issuers', 'organizations');

        //Update foreign key in certificates
        Schema::table('certificates', function (Blueprint $table) {
            // Drop the old foreign key
            $table->dropForeign(['issuer_id']);
            // Rename the column
            $table->renameColumn('issuer_id', 'organization_id');
            // Add the new foreign key
            $table->foreign('organization_id')
                  ->references('id')
                  ->on('organizations')
                  ->onDelete('cascade');
        });

        // Update foreign keys in degrees
        Schema::table('degrees', function (Blueprint $table) {
            $table->dropForeign(['issuer_id']);          
            $table->renameColumn('issuer_id', 'organization_id'); 
            $table->foreign('organization_id')
                  ->references('id')
                  ->on('organizations')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse: degrees first
        Schema::table('degrees', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->renameColumn('organization_id', 'issuer_id');
            $table->foreign('issuer_id')
                  ->references('id')
                  ->on('issuers')
                  ->onDelete('cascade');
        });

        // certificates next
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->renameColumn('organization_id', 'issuer_id');
            $table->foreign('issuer_id')
                  ->references('id')
                  ->on('issuers')
                  ->onDelete('cascade');
        });

        // Rename the table back
        Schema::rename('organizations', 'issuers');
    }
};
