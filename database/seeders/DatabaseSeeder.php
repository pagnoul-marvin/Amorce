<?php

namespace Database\Seeders;

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
        // Créer 4 utilisateurs
        $users = User::factory(4)
            ->has(Task::factory()->count(5), 'tasks') // Chaque utilisateur a 5 tâches
            ->create();

        foreach ($users as $user) {
            // Assigner le propriétaire à ses propres tâches
            $user->tasks->each(function ($task) use ($user) {
                $task->user_id = $user->id; // Assigner l'utilisateur comme propriétaire de la tâche
                $task->save();

                // Assigner entre 1 et 3 autres utilisateurs (mais pas le propriétaire)
                $usersToAssign = User::where('id', '!=', $user->id)
                    ->inRandomOrder() // Mélanger les utilisateurs
                    ->take(rand(1, 3)) // Prendre entre 1 et 3 utilisateurs
                    ->pluck('id'); // Extraire uniquement les IDs des utilisateurs

                $task->users()->attach($usersToAssign);
            });
        }

        // Créer un utilisateur spécifique (Marvin) avec 5 tâches
        $marvin = User::factory()
            ->has(Task::factory()->count(5), 'tasks')
            ->create([
                'firstname' => 'Marvin',
                'lastname' => 'Pagnoul',
                'email' => 'marvinpagnoul@icloud.com',
                'password' => 'Admin1234@'
            ]);

        $marvin->tasks->each(function ($task) use ($marvin) {
            $task->user_id = $marvin->id; // Assigner Marvin comme propriétaire de la tâche
            $task->save();

            // Assigner entre 1 et 3 autres utilisateurs (mais pas Marvin lui-même)
            $usersToAssign = User::where('id', '!=', $marvin->id)
                ->inRandomOrder() // Mélanger les utilisateurs
                ->take(rand(1, 3)) // Prendre entre 1 et 3 utilisateurs
                ->pluck('id'); // Extraire uniquement les IDs des utilisateurs

            $task->users()->attach($usersToAssign); // Assigner les utilisateurs à la tâche
        });
    }
}
