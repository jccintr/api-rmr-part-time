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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('servico_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('profissional_id');
            $table->date('data');
            $table->date('data_servico');
            $table->string('descricao')->nullable();
            $table->string('local')->nullable();
            $table->integer('quant')->default(1);
            $table->integer('valor_unitario_cliente')->default(0);
            $table->integer('valor_unitario_profissional')->default(0);
            $table->integer('total_cliente')->default(0);
            $table->integer('total_profissional')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
            // cria o relacionamento com a tabela serviços
            $table->foreign('servico_id')->references('id')->on('servicos');
             // cria o relacionamento com a tabela users
             $table->foreign('cliente_id')->references('id')->on('users');
              // cria o relacionamento com a tabela users
              $table->foreign('profissional_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};

/*
status

Cliente solicita o serviço
Profissional aceita o servico
Cliente paga o servico
Profissional executa o servico
Cliente libera o pagamento




1-servico solicitado
2-aceito pelo profissional ->servico pago pelo cliente
  
3-recusado pelo profissional
4-servico executado

*/
