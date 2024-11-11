<?php

namespace App\View\Components\navigations;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title ='', public array $links = [])
    {
        $this->title = 'Navigation principale';
        $this->links = [
            ['name' => 'Accueil', 'url' => '/accueil'],
            ['name' => 'Projets', 'url' => '/projets'],
            ['name' => 'Todo list', 'url' => '/todolist'],
            ['name' => 'Comptes rendus', 'url' => '/comptes-rendus'],
            ['name' => 'Newsletter', 'url' => '/newsletter'],
            ['name' => 'Fonds et dons', 'url' => '/fonds-et-dons'],
            ['name' => 'Profil', 'url' => '/profil'],
            ['name' => 'Espace administrateur', 'url' => '/espace-administrateur'],
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
