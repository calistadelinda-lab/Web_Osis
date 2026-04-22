<?php

namespace App\Filament\Resources\PendaftaranAnggotas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PendaftaranAnggotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nisn')
                    ->required(),
                TextInput::make('kelas')
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
                TextInput::make('bidang')
                    ->required(),
                Textarea::make('pengalaman')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('motivasi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
