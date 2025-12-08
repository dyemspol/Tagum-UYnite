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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('title');
            $table->text('content');

            $table->enum('report_status', ['pending', 'in_review', 'resolved'])->default('pending');
            $table->enum('post_status', ['removed', 'pending', 'approved'])->default('pending');
        
            $table->string('rejection_reason')->nullable();
            $table->enum('priority_level', ['low', 'medium', 'high'])->nullable();

            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('reviewed_at')->nullable();

            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->foreignId('barangay')->nullable()->constrained('barangays');
            $table->string('street_purok');
            $table->text('address_details')->nullable(); 
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();

            $table->index('id');
            $table->index('user_id');
            $table->index('reviewed_by');
            $table->index('barangay');
            $table->index('street_purok');
            $table->index('created_at');
            $table->index('updated_at');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
