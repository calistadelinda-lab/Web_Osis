<?php

namespace App\Filament\Resources\PendaftaranKetuas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PendaftaranKetuaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nisn')
                    ->required()
                    ->numeric(),
                TextInput::make('kelas')
                    ->required(),
                TextInput::make('no_hp')
                    ->required()
                    ->numeric(),
                TextInput::make('jabatan')
                    ->required(),
                Textarea::make('visi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('misi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('motivasi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
