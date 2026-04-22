<?php

namespace App\Filament\Resources\PendaftaranAnggotas\Pages;

use App\Filament\Resources\PendaftaranAnggotas\PendaftaranAnggotaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaranAnggota extends EditRecord
{
    protected static string $resource = PendaftaranAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
