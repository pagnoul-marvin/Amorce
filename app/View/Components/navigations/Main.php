<?php

namespace App\View\Components\navigations;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $main_nav_title = '', public array $main_links = [], public ?User $user = null)
    {
        $this->user = Auth::user();
        $this->main_nav_title = __('text.main_navigation');
        $this->main_links = [
            ['name' => __('texts.home'), 'url' => '/accueil'],
            ['name' => __('texts.projects'), 'url' => '/projets'],
            ['name' => __('texts.todo_list'), 'url' => '/todolist'],
            ['name' => __('texts.reports'), 'url' => '/comptes-rendus'],
            ['name' => __('texts.newsletter'), 'url' => '/newsletter'],
            ['name' => __('texts.account_donation'), 'url' => '/fonds-et-dons'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigations.main');
    }
}
