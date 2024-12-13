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
        Schema::create('_company_data', function (Blueprint $table) {
            $table->uuid('id')->primary(); // implementação do uuid
            $table->uuid('company_id'); // chave para o company_id
            $table->string('data_type'); // Tipo de dado Ex: 'financeiro', 'estoque'
            $table->text('value');
            $table->string('industry')->nullable();
            $table->timestamps();

            // definindo a chave estrangeira para a tabela da company
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_data');
    }
};
