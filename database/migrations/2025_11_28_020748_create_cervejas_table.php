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
        Schema::create('cervejas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Campos Obrigatórios (Strings)
            $table->string('name');
            $table->string('brand');
            $table->string('style');

            // Boolean (Checkbox) - Importante ter default false
            $table->boolean('artesanal')->default(false);

            // Enum (Embalagem)
            $table->enum('embalagem', ['lata', 'garrafa', 'barril']);

            // Números (Nullable onde não é obrigatório)
            $table->integer('ibu')->nullable();

            // Decimal para ABV (Ex: 12.5) - 3 dígitos no total, 1 depois da vírgula
            $table->decimal('abv', 3, 1);

            // Texto Longo
            $table->text('descricao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cervejas');
    }
};
