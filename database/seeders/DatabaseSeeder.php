<?php

namespace Database\Seeders;

use App\Enum\UserRoles;
use App\Models\Detente;
use App\Models\Transaction;
use App\Models\Fund;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $marvin = User::factory()
            ->has(Task::factory()->count(50), 'tasks')
            ->create([
                'firstname' => 'Marvin',
                'lastname' => 'Pagnoul',
                'email' => 'marvinpagnoul@icloud.com',
                'password' => 'Admin1234@',
                'role' => UserRoles::Admin->value
            ]);

        $dominique = User::factory()
            ->has(Task::factory()->count(50), 'tasks')
            ->create([
                'firstname' => 'Dominique',
                'lastname' => 'Vilain',
                'email' => 'dominique.vilain@hepl.be',
                'password' => 'Dominique1234@',
                'role' => UserRoles::Admin->value
            ]);

        $michael = User::factory()
            ->has(Task::factory()->count(50), 'tasks')
            ->create([
                'firstname' => 'Michaël',
                'lastname' => 'Lecerf',
                'email' => 'michael@lecerf.be',
                'password' => 'Michael1234@',
                'role' => UserRoles::Admin->value
            ]);

        $users = User::factory(100)
            ->has(Task::factory()->count(50), 'tasks')
            ->create();

        $marvin->tasks->each(function ($task) use ($marvin) {
            $task->user_id = $marvin->id;
            $task->save();

            $usersToAssign = User::where('id', '!=', $marvin->id)
                ->inRandomOrder()
                ->take(rand(1, 5))
                ->pluck('id');

            $task->users()->attach($usersToAssign);
        });

        $dominique->tasks->each(function ($task) use ($dominique) {
            $task->user_id = $dominique->id;
            $task->save();

            $usersToAssign = User::where('id', '!=', $dominique->id)
                ->inRandomOrder()
                ->take(rand(1, 5))
                ->pluck('id');

            $task->users()->attach($usersToAssign);
        });

        $michael->tasks->each(function ($task) use ($michael) {
            $task->user_id = $michael->id;
            $task->save();

            $usersToAssign = User::where('id', '!=', $michael->id)
                ->inRandomOrder()
                ->take(rand(1, 5))
                ->pluck('id');

            $task->users()->attach($usersToAssign);
        });

        foreach ($users as $user) {
            $user->tasks->each(function ($task) use ($user) {
                $task->user_id = $user->id;
                $task->save();

                $usersToAssign = User::where('id', '!=', $user->id)
                    ->inRandomOrder()
                    ->take(rand(1, 5))
                    ->pluck('id');

                $task->users()->attach($usersToAssign);
            });
        }

        $allUsers = $users->concat([$marvin, $dominique, $michael]);

        $general_fund = Fund::factory()->create([
            'name' => 'General',
            'description' => 'Le fond général est le fond de base de l\'Amorce',
            'pourcentage' => 0,
            'enclosed' => false
        ]);

        $fonctionnement_fund = Fund::factory()->create([
            'name' => 'Fonctionnement',
            'description' => 'Le fond de fonctionnement est le fond qui gère l\'argent qui permet le bon fonctionnement de l\'Amorce',
            'pourcentage' => 0,
            'enclosed' => false
        ]);

        $opened_funds = Fund::factory(5)->create(['enclosed' => false]);

        Fund::factory(5)->create(['enclosed' => true]);

        $funds = collect([$general_fund, $fonctionnement_fund])->concat($opened_funds);

        foreach ($funds as $fund) {
            Transaction::factory()->count(20)->create([
                'fund_id' => $fund->id,
                'user_id' => function () use ($allUsers) {
                    return $allUsers->random()->id;
                }
            ]);
        }

        $startDate = '2025-01-01';
        $detenteCount = 10;
        $detentes = Detente::factory()->generateConsecutivePeriods($startDate, $detenteCount);

        foreach ($detentes as $period) {
            $detente = Detente::create($period);
            $selectedUsers = $allUsers->random(9);
            $detente->users()->attach($selectedUsers->pluck('id'));
        }
    }
}
