<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

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
    }
}
