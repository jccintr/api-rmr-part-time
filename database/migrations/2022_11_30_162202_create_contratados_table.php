<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servico_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('ativo')->default(false);
            // cria o relacionamento com a tabela serviços
            $table->foreign('servico_id')->references('id')->on('servicos');
            // cria o relacionamento com a tabela users
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratados');
    }
};
