<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateIndicatorsTable extends Migration
{
    public function up(): void
    {
        Schema::create('indicators', static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->string('type', 32);
            $table->string('value', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indicators');
    }
}
