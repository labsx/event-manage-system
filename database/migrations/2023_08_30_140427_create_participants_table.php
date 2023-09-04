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
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->constrained()
                ->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('event');
            // $table->integer('max');
            // $table->integer('count')->default(2);
            $table->timestamps();
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
