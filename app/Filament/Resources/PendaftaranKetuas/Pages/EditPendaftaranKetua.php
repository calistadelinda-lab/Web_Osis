<?php

namespace App\Filament\Resources\PendaftaranKetuas\Pages;

use App\Filament\Resources\PendaftaranKetuas\PendaftaranKetuaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaranKetua extends EditRecord
{
    protected static string $resource = PendaftaranKetuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
