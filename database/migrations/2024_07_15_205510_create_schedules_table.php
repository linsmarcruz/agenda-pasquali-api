<?php

use App\Enums\StatusScheduleEnum;
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
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('title');
            $table->string('type');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->enum('status', StatusScheduleEnum::getAll())->default(StatusScheduleEnum::OPEN);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
