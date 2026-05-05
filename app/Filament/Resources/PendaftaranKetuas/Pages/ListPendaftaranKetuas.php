<?php

namespace App\Filament\Resources\PendaftaranKetuas\Pages;

use App\Filament\Resources\PendaftaranKetuas\PendaftaranKetuaResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranKetuas extends ListRecords
{
    protected static string $resource = PendaftaranKetuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('togglePendaftaran')
                ->label(fn () => \App\Models\SettingKetua::first()?->kondisi_daftar ? 'Tutup Pendaftaran' : 'Buka Pendaftaran')
                ->color(fn () => \App\Models\SettingKetua::first()?->kondisi_daftar ? 'danger' : 'success')
                ->icon(fn () => \App\Models\SettingKetua::first()?->kondisi_daftar ? 'heroicon-o-lock-closed' : 'heroicon-o-lock-open')
                ->action(function () {
                    $pengaturan = \App\Models\SettingKetua::first();
                    if ($pengaturan) {
                        $pengaturan->update([
                            'kondisi_daftar' => !$pengaturan->kondisi_daftar
                        ]);
                    }
                })
                ->requiresConfirmation()
                ->after(function () {
                    $this->dispatch('refreshList');
                }),
        ];
    }
}
