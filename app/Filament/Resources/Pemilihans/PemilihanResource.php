<?php

namespace App\Filament\Resources\Pemilihans;

use App\Filament\Resources\Pemilihans\Pages\CreatePemilihan;
use App\Filament\Resources\Pemilihans\Pages\EditPemilihan;
use App\Filament\Resources\Pemilihans\Pages\ListPemilihans;
use App\Filament\Resources\Pemilihans\Pages\ViewPemilihan;
use App\Filament\Resources\Pemilihans\Schemas\PemilihanForm;
use App\Filament\Resources\Pemilihans\Schemas\PemilihanInfolist;
use App\Filament\Resources\Pemilihans\Tables\PemilihansTable;
use App\Models\Pemilihan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PemilihanResource extends Resource
{
    // 1. Mengubah nama di Sidebar
    protected static ?string $navigationLabel = 'Calon Ketua & Wakil OSIS';

    // 2. Mengubah judul besar di Header halaman dan Breadcrumbs
    protected static ?string $pluralModelLabel = 'Calon Ketua & Wakil OSIS';

    // 3. Mengubah label saat membuat data baru (misal: "Create Calon Ketua & Wakil OSIS")
    protected static ?string $modelLabel = 'Calon Ketua & Wakil OSIS';
    protected static ?string $model = Pemilihan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PemilihanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PemilihanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PemilihansTable::configure($table);
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
            'index' => ListPemilihans::route('/'),
            'create' => CreatePemilihan::route('/create'),
            'view' => ViewPemilihan::route('/{record}'),
            'edit' => EditPemilihan::route('/{record}/edit'),
        ];
    }
}
