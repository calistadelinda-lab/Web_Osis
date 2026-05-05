<?php

namespace App\Filament\Resources\Pemilihans\Pages;

use App\Filament\Resources\Pemilihans\PemilihanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPemilihan extends ViewRecord
{
    protected static string $resource = PemilihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
