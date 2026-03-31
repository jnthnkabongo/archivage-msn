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
        // D'abord, mettre à jour toutes les valeurs 'jpeg' en 'jpg' pour éviter le conflit
        DB::table('documents')->where('type_fichier', 'jpeg')->update(['type_fichier' => 'jpg']);
        
        // Puis modifier l'enum
        Schema::table('documents', function (Blueprint $table) {
            $table->enum('type_fichier', ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'png', 'jpg'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ne rien faire pour éviter le conflit lors du rollback
        // L'enum avec 'jpeg' n'existe plus, donc on ne peut pas revenir en arrière
    }
};
