<?php

namespace App\Filament\Resources\PendaftaranAnggotas\Pages;

use App\Filament\Resources\PendaftaranAnggotas\PendaftaranAnggotaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPendaftaranAnggota extends ViewRecord
{
    protected static string $resource = PendaftaranAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
