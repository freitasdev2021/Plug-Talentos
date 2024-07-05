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
        Schema::create('empresas',function(Blueprint $table){
            $table->id();
            $table->string('Foto',100);
            $table->string('NMEmpresa',50)->nullable(false);
            $table->string('CNPJ',14)->nullable(false);
            $table->string('Telefone',11)->nullable(false);
            $table->string('Endereco',150)->nullable(false);
            $table->string('UF',2)->nullable(false);
            $table->string('Cidade',30)->nullable(false);
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
