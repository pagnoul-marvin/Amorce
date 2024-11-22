<?php

namespace Database\Seeders;

use App\Models\Detente;
use App\Models\Donation;
use App\Models\Fund;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(4)
            ->has(Task::factory()->count(7), 'tasks')
            ->create();

        foreach ($users as $user) {
            // Assigner le propriétaire à ses propres tâches
            $user->tasks->each(function ($task) use ($user) {
                $task->user_id = $user->id;
                $task->save();

                // Assigner entre 1 et 3 autres utilisateurs (mais pas le propriétaire)
                $usersToAssign = User::where('id', '!=', $user->id)
                    ->inRandomOrder()
                    ->take(rand(1, 3))
                    ->pluck('id');

                $task->users()->attach($usersToAssign);
            });
        }


        $marvin = User::factory()
            ->has(Task::factory()->count(7), 'tasks')
            ->create([
                'firstname' => 'Marvin',
                'lastname' => 'Pagnoul',
                'email' => 'marvinpagnoul@icloud.com',
                'password' => 'Admin1234@'
            ]);

        $marvin->tasks->each(function ($task) use ($marvin) {
            $task->user_id = $marvin->id;
            $task->save();

            $usersToAssign = User::where('id', '!=', $marvin->id)
                ->inRandomOrder()
                ->take(rand(1, 4))
                ->pluck('id');

            $task->users()->attach($usersToAssign);
        });

        Detente::factory(10)->create();
        Fund::factory(5)->create();

        Fund::factory()->create([
            'name' => 'General',
            'description' => 'Le fond général est le fond de base de l\'Amorce',
            'pourcentage' => 0,
            'enclosed' => false
        ]);

        Fund::factory()->create([
            'name' => 'Fonctionnement',
            'description' => 'Le fond de fonctionnement est le fond qui gère l\'argent qui permet le bon fonctionnement de l\'Amorce' ,
            'pourcentage' => 0,
            'enclosed' => false
        ]);

        $donations = Donation::factory(100)->create();

        foreach ($donations as $donation) {
            $donation->fund_id = Fund::all()->random()->id;
            $donation->save();
        }
    }
}
