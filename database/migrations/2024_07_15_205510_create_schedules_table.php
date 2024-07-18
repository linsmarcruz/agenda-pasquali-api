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
            $table->uuid('type_uuid');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->enum('status', StatusScheduleEnum::getAll())->default(StatusScheduleEnum::OPEN);
            $table->timestamps();

            $table->foreign('type_uuid')->references('uuid')->on('schedule_types')->noActionOnDelete();
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
