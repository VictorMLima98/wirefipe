<?php

namespace App\View\Components;

use Illuminate\View\{Component, View};

class Header extends Component
{
    public array $links = [];

    public function __construct()
    {
        $this->links = [
            [
                'label'  => 'Carros',
                'href'   => '#',
                'active' => false,
            ], [
                'label'  => 'Motos',
                'href'   => '#',
                'active' => false,
            ], [
                'label'  => 'Caminhões',
                'href'   => '#',
                'active' => false,
            ],
        ];
    }

    public function render(): View
    {
        return view('components.header');
    }
}
