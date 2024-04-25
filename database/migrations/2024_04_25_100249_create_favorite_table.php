<?php

use App\Models\User;
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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignIdFor(User::class, 'user_id')->constrained('users');
        });

        Schema::table('favorites', function (Blueprint $table) {
            $table->unsignedBigInteger('fav_user_id');
            $table->foreign('fav_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
