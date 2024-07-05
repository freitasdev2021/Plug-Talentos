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
        Schema::create('postagens',function(Blueprint $table){
            $table->id();
            $table->string('Foto',250)->nullable(false);
            $table->string('Titulo',50)->nullable(false);
            $table->text('DSPostagem')->nullable(false);
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
