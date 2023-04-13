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
                'label'  => 'Home',
                'href'   => route('index'),
                'active' => request()->is('/'),
            ], [
                'label'  => 'Carros',
                'href'   => route('cars.index'),
                'active' => request()->is('cars'),
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
