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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id(); // Unieke ID (1, 2, 3...)
        $table->string('title'); // Titel van de taak
        $table->text('description')->nullable(); // Lange tekst, mag leeg zijn
        $table->date('due_date')->nullable(); // Deadline, optioneel
        $table->timestamps(); // created_at en updated_at automatisch
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
