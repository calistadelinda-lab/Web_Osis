<?php

namespace App\Filament\Resources\PendaftaranAnggotas;

use App\Filament\Resources\PendaftaranAnggotas\Pages\CreatePendaftaranAnggota;
use App\Filament\Resources\PendaftaranAnggotas\Pages\EditPendaftaranAnggota;
use App\Filament\Resources\PendaftaranAnggotas\Pages\ListPendaftaranAnggotas;
use App\Filament\Resources\PendaftaranAnggotas\Pages\ViewPendaftaranAnggota;
use App\Filament\Resources\PendaftaranAnggotas\Schemas\PendaftaranAnggotaForm;
use App\Filament\Resources\PendaftaranAnggotas\Schemas\PendaftaranAnggotaInfolist;
use App\Filament\Resources\PendaftaranAnggotas\Tables\PendaftaranAnggotasTable;
use App\Models\PendaftaranAnggota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendaftaranAnggotaResource extends Resource
{
    protected static ?string $model = PendaftaranAnggota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PendaftaranAnggotaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PendaftaranAnggotaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PendaftaranAnggotasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPendaftaranAnggotas::route('/'),
            'view' => ViewPendaftaranAnggota::route('/{record}'),
        ];
    }
}
