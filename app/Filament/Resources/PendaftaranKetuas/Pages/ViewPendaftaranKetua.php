<?php

namespace App\Filament\Resources\PendaftaranKetuas\Pages;

use App\Filament\Resources\PendaftaranKetuas\PendaftaranKetuaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPendaftaranKetua extends ViewRecord
{
    protected static string $resource = PendaftaranKetuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
