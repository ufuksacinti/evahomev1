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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title'); // Ev, İş, vb.
            $table->string('full_name');
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->string('district');
            $table->string('postal_code')->nullable();
            $table->boolean('is_default')->default(false);
            $table->enum('type', ['billing', 'shipping', 'both'])->default('both');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
