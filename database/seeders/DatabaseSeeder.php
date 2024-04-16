<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->has(Address::factory(1))->create();
        Contact::factory(5)->create();

        $users->each(function ($user, $key) {
            $userIds = array_diff(range(1, 5), [$user->id]);

            Message::factory(3)->create([
                'from_user_id' => $user->id,
                'to_user_id' => $userIds[array_rand($userIds)],
            ]);
        });

        User::factory()->has(Address::factory())->create([
            'email' => 'admin@test.de',
            'password' => Hash::make('password'),
            'username' => 'admin',
            'firstname' => 'User',
            'lastname' => 'Admin',
            'birthday' => date('Y-m-d', strtotime('-20 year')),
            'is_admin' => true,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
