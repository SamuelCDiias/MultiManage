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
        Schema::create('_company_access', function (Blueprint $table) {
            $table->uuid('id')->primary(); // implementação do uuid
            $table->uuid('company_id'); // chave para companies
            $table->uuid('user_id'); // chave para user
            $table->timestamps();

            // definindo a chave estrangeira para a tabela companies e users
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_access');
    }
};
