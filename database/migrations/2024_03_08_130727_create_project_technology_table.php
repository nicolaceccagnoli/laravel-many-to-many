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
        Schema::create('project_technology', function (Blueprint $table) {
            //Rispettando le naming conventions posso utilizzare un unico
            //comando per creare la colonna con il vincolo di FK

            $table->foreignId('project_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreignId('technology_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['project_id', 'technology_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
