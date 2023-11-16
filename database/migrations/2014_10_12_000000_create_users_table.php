<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Distrito;
use App\Models\Concelho;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) { //estado
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('concelhos', function (Blueprint $table) { //cidades
            $table->id();
            $table->string('nome');
            $table->foreignIdFor(Distrito::class);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefone')->nullable();
            $table->string('documento')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            
            $table->foreignIdFor(Concelho::class);
            $table->integer('role')->default(1); // 0-admin 1-cliente 2-profissional
            $table->float('stars')->default(0);
            $table->string('avatar')->nullable();
            $table->string('push_token')->nullable();

            $table->string('verification_code')->nullable();
            $table->timestamp('code_expire_at')->nullable();

            $table->string('password_verification_code')->nullable();
            $table->timestamp('password_code_expire_at')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
