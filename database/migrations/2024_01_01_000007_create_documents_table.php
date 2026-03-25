<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('reference')->unique();
            $table->text('description')->nullable();
            $table->string('fichier');
            $table->enum('type', ['entrant', 'sortant', 'interne']);
            $table->date('date_document')->nullable();
            $table->foreignId('categorie_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->enum('statut', ['actif', 'archive', 'supprime'])->default('actif');
            $table->enum('niveau_confidentialite', ['public', 'interne', 'secret'])->default('interne');
            $table->string('qr_code')->nullable();
            $table->longText('ocr_text')->nullable();
            $table->integer('nombre_pages')->nullable();
            $table->bigInteger('taille_fichier')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
