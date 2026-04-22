<?php

namespace App\Filament\Resources\PendaftaranAnggotas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PendaftaranAnggotaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('nisn'),
                TextEntry::make('kelas'),
                TextEntry::make('no_hp'),
                TextEntry::make('bidang'),
                TextEntry::make('pengalaman')
                    ->columnSpanFull(),
                TextEntry::make('motivasi')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
