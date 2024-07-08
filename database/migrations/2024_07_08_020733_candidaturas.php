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
        Schema::create('candidaturas',function(Blueprint $table){
            $table->id();
            $table->string('Candidato',30)->nullable(false);
            $table->string('Telefone',11)->nullable(false);
            $table->string('Candidato',30)->nullable(false);
            $table->string('Linkedin',100)->nullable(true);
            $table->string('Curriculo',100)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
