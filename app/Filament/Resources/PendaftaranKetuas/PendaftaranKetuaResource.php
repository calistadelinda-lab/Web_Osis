<?php

namespace App\Filament\Resources\PendaftaranKetuas;

use App\Filament\Resources\PendaftaranKetuas\Pages\CreatePendaftaranKetua;
use App\Filament\Resources\PendaftaranKetuas\Pages\EditPendaftaranKetua;
use App\Filament\Resources\PendaftaranKetuas\Pages\ListPendaftaranKetuas;
use App\Filament\Resources\PendaftaranKetuas\Pages\ViewPendaftaranKetua;
use App\Filament\Resources\PendaftaranKetuas\Schemas\PendaftaranKetuaForm;
use App\Filament\Resources\PendaftaranKetuas\Schemas\PendaftaranKetuaInfolist;
use App\Filament\Resources\PendaftaranKetuas\Tables\PendaftaranKetuasTable;
use App\Models\PendaftaranKetua;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendaftaranKetuaResource extends Resource
{
    protected static ?string $model = PendaftaranKetua::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PendaftaranKetuaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PendaftaranKetuaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PendaftaranKetuasTable::configure($table);
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
            'index' => ListPendaftaranKetuas::route('/'),
            'view' => ViewPendaftaranKetua::route('/{record}'),
        ];
    }
}
