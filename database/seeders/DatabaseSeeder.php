<?php

namespace Database\Seeders;

use App\Enum\UserRoles;
use App\Models\Transaction;
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
        $marvin = User::factory()
            ->has(Task::factory()->count(50), 'tasks')
            ->create([
                'firstname' => 'Marvin',
                'lastname' => 'Pagnoul',
                'email' => 'marvinpagnoul@icloud.com',
                'password' => 'Admin1234@',
                'role' => UserRoles::Admin->value
            ]);

        $users = User::factory(10)
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

        $general_fund = Fund::factory()
            ->has(Transaction::factory(20), 'transactions')
            ->create([
            'name' => 'General',
            'description' => 'Le fond général est le fond de base de l\'Amorce',
            'pourcentage' => 0,
            'enclosed' => false
        ]);

        $fonctionnement_fund = Fund::factory()
            ->has(Transaction::factory(20), 'transactions')
            ->create([
            'name' => 'Fonctionnement',
            'description' => 'Le fond de fonctionnement est le fond qui gère l\'argent qui permet le bon fonctionnement de l\'Amorce',
            'pourcentage' => 0,
            'enclosed' => false
        ]);

        $opened_funds = Fund::factory(5)
            ->has(Transaction::factory(20), 'transactions')
            ->create(['enclosed' => false]);

        Fund::factory(5)
            ->create(['enclosed' => true]);

        $general_fund->transactions->each(function ($transaction) use ($general_fund) {
           $transaction->fund_id = $general_fund;
        });

        $fonctionnement_fund->transactions->each(function ($transaction) use ($fonctionnement_fund) {
            $transaction->fund_id = $fonctionnement_fund;
        });

        foreach ($opened_funds as $fund) {
            $fund->transactions->each(function ($transaction) use ($fund) {
                $transaction->fund_id = $fund;
            });
        }
    }
}
