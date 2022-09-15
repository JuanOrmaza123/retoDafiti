<?php

namespace App\Providers;

use App\Services\Contracts\Poker\PokerServiceInterface;
use App\Services\Poker\PokerService;
use Illuminate\Support\ServiceProvider;

class PokerServiceProvider extends ServiceProvider
{
    protected $classes = [
        PokerServiceInterface::class => PokerService::class
    ];

    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    public function provides(): array
    {
        return array_keys($this->classes);
    }
}
