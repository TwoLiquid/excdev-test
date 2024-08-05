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
        Schema::create('user_balance_operations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('balance_id')->unsigned()->index();
            $table->enum('type', ['increase', 'decrease']);
            $table->double('amount');
            $table->double('total');
            $table->longText('description')->nullable();
            $table->datetimes();
            $table->softDeletesDatetime();

            $table->foreign('balance_id')
                ->references('id')
                ->on('user_balances')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_balance_operations');
    }
};
