<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DetenteForm;
use App\Models\Detente;
use App\Models\User;
use Livewire\Component;

class CreateDetenteModal extends Component
{
    public DetenteForm $form;

    public $isOpen = false;

    public $lastDetenteCreated;
    public $lastUsersDetenteCreated = [];

    public $currentDetente;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal(): void
    {
        $this->isOpen = true;
        $this->currentDetente = Detente::latest()->first();
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
        $this->lastDetenteCreated = null;
        $this->lastUsersDetenteCreated = [];
    }

    public function save(): void
    {
        $this->form->store();
        $this->form->reset();
        $this->dispatch('openSuccessMessage', 'La détente a été créée avec succès ! Vous pouvez désormais y ajouter des utilisateurs aléatoirement.');
        $this->lastDetenteCreated = Detente::latest()->first();
        $this->lastUsersDetenteCreated = $this->lastDetenteCreated->users;
    }

    public function randomizeUsers(): void
    {
        $users = User::all();

        $eligibleUsers = $users->filter(function($user) {
            $oneYearAgo = now()->subYear();
            $hasParticipatedRecently = $user->detentes()->where('detentes.created_at', '>=', $oneYearAgo)->exists();

            $transactions = $user->transactions()->orderBy('created_at')->get();

            $monthsWithTransactions = [];

            foreach ($transactions as $transaction) {
                $month = $transaction->created_at->format('Y-m');

                if (!in_array($month, $monthsWithTransactions)) {
                    $monthsWithTransactions[] = $month;
                }
            }

            sort($monthsWithTransactions);

            $hasMade3ConsecutiveDonations = false;

            for ($i = 0; $i < count($monthsWithTransactions) - 2; $i++) {
                $currentMonth = $monthsWithTransactions[$i];
                $nextMonth = date('Y-m', strtotime("$currentMonth +1 month"));
                $nextNextMonth = date('Y-m', strtotime("$currentMonth +2 months"));

                if (in_array($nextMonth, $monthsWithTransactions) && in_array($nextNextMonth, $monthsWithTransactions)) {
                    $hasMade3ConsecutiveDonations = true;
                    break;
                }
            }

            $hasAlreadyParticipated = $this->currentDetente->users->contains($user);

            return !$hasParticipatedRecently && $hasMade3ConsecutiveDonations && !$hasAlreadyParticipated;
        });

        $randomUsers = $eligibleUsers->random(9);
        $this->lastDetenteCreated->users()->attach($randomUsers);
    }
}
