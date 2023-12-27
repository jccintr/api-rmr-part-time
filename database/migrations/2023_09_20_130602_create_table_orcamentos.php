<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Distrito;
use App\Models\Concelho;
use App\Models\Proposta;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class); // solicitante
            $table->foreignIdFor(Categoria::class);  // categoria: pintor, pedreiro...
            $table->foreignIdFor(Proposta::class)->nullable(); // solicitante
            $table->string('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->foreignIdFor(Distrito::class);
            $table->foreignIdFor(Concelho::class);
            $table->string('imagem')->nullable();
            $table->integer('status')->default(0); // 0-aguardando propostas 1-proposta aceita
            //$table->datetime('data_execucao')->nullable();
            //$table->unsignedBigInteger('proposta_id');
            $table->timestamps();
            //$table->foreign('proposta_id')->references('id')->on('propostas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
};
