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
        Schema::create('vagas',function(Blueprint $table){
            $table->id();
            $table->string('NMVaga',30)->nullable(false);
            $table->string('DSVaga',250)->nullable(false);
            $table->integer('TPVaga')->nullable(false); //0:Presencial, 1:Remoto, 2:Hibrido
            $table->integer('TPContrato')->nullable(false); //0:CLT, 1:PJ, 2:Freelancer, 3: Cooperado
            $table->float('Salario')->default(0);
            $table->integer('STVaga')->default(1);
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
