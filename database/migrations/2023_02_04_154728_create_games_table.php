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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('home')->references('id')->on('clubs')->cascadeOnDelete();
            $table->foreignId('guest')->references('id')->on('clubs')->cascadeOnDelete();
            $table->tinyInteger('home_score')->default(0);
            $table->tinyInteger('guest_score')->default(0);
            $table->dateTime('date')->default(now());
            $table->foreignIdFor(\App\Models\Stadium::class)->default(1);
            $table->foreignIdFor(\App\Models\Tournament::class)->default(1);
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
        Schema::dropIfExists('games');
    }
};
