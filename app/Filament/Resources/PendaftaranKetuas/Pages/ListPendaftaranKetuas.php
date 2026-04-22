<?php

namespace App\Filament\Resources\PendaftaranKetuas\Pages;

use App\Filament\Resources\PendaftaranKetuas\PendaftaranKetuaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranKetuas extends ListRecords
{
    protected static string $resource = PendaftaranKetuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
          
        ];
    }
}
