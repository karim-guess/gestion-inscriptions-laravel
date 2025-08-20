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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
             $table->string('nom');
        $table->string('email');
        $table->string('telephone')->nullable();
        $table->date('date_inscription');
        $table->enum('statut', ['en_attente', 'validee', 'dossier_incomplet', 'annulee'])->default('en_attente');
        $table->boolean('prioritaire')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
