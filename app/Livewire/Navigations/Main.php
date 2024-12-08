<?php

namespace App\Livewire\Navigations;

use Livewire\Component;

class Main extends Component
{
    public $main_nav_title;
    public $main_links;

    public function mount(): void
    {
        $this->main_nav_title = __('texts.main_navigation');
        $this->main_links = [
            ['name' => __('texts.home'), 'url' => '/accueil'],
            ['name' => __('texts.projects'), 'url' => '/projets'],
            ['name' => __('texts.todo_list'), 'url' => '/todolist'],
            ['name' => __('texts.reports'), 'url' => '/comptes-rendus'],
            ['name' => __('texts.newsletter'), 'url' => '/newsletter'],
            ['name' => __('texts.account_transactions'), 'url' => '/fonds-et-transactions'],
        ];
    }

}
