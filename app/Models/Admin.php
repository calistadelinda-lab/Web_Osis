<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    // Syarat agar model ini bisa akses panel Filament
    public function canAccessPanel(Panel $panel): bool
    {
        return true; // Bisa ditambah logika filter email di sini
    }
}