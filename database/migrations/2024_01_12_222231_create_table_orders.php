<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Proposta;
use App\Models\Orcamento;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orcamento::class);
            $table->foreignIdFor(Proposta::class);
            $table->decimal('valor_proposta', 5, 2)->default(0);
            $table->decimal('valor_iva', 5, 2)->default(0);
            $table->decimal('valor_taxa_uso', 5, 2)->default(0);
            $table->decimal('valor_total_cliente', 5, 2)->default(0); // valor proposta + iva + taxa uso
            $table->decimal('valor_taxa_profissional', 5, 2)->default(0);
            $table->decimal('valor_profissional', 5, 2)->default(0); // valor proposta - perc_profissional
            $table->string('payment_intent')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
