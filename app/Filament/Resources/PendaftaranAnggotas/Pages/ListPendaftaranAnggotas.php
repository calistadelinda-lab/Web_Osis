<?php

namespace App\Filament\Resources\PendaftaranAnggotas\Pages;

use App\Filament\Resources\PendaftaranAnggotas\PendaftaranAnggotaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranAnggotas extends ListRecords
{
    protected static string $resource = PendaftaranAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }
}
