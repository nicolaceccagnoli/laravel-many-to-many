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
        Schema::table('projects', function (Blueprint $table) {
            //Rispettando le naming conventions posso utilizzare un unico
            //comando per creare la colonna con il vincolo di FK

            $table->foreignId('type_id')
                    ->after('content')         //metto la FK dopo la colonna 'content'
                    ->nullable()              
                    ->constrained()
                    ->onDelete('set null')     //se cancello un singolo Type allora setta a 'null' tutti i progetti che avevano il suo type_id come FK
                    ->onUpdate('cascade');     //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Stabilisco una condizione per cui se la tabella 'projects' ha la colonna 'type_id'
            if (Schema::hasColumn('projects','type_id')) {

            // Allora elimina la FK
            // $table->dropForeign('projects_type_id_foreign');

            // OPPURE
            $table->dropForeign(['type_id']);
               
            // Ed elimina la colonna
            $table->dropColumn('type_id');
            }
        });
    }
};
