<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userCollection = \App\Models\User::factory(10)->has(Address::factory(1))->create();
        \App\Models\Contact::factory(10)->create();

        $userCollection->each(function ($item, $key) {
            $userIds = array_diff(range(1, 10), [$item->id]);

            Message::factory(10)->create([
                'user_id' => $item->id,
                'from_user_id' => $userIds[array_rand($userIds)],
            ]);
        });
    }
}
