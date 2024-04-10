<?php

declare(strict_types=1);

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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->boolean('readed');
            $table->timestamps();
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignIdFor(User::class, 'user_id')->constrained('users');
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignIdFor(User::class, 'from_user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
