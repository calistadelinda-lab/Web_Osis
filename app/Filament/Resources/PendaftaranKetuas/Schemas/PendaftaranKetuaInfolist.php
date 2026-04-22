<?php

namespace App\Filament\Resources\PendaftaranKetuas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PendaftaranKetuaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('nisn')
                    ->numeric(),
                TextEntry::make('kelas'),
                TextEntry::make('no_hp')
                    ->numeric(),
                TextEntry::make('jabatan'),
                TextEntry::make('visi')
                    ->columnSpanFull(),
                TextEntry::make('misi')
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
