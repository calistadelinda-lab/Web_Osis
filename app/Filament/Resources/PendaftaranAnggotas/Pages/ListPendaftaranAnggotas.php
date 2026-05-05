<?php

namespace App\Filament\Resources\PendaftaranAnggotas\Pages;

use App\Filament\Resources\PendaftaranAnggotas\PendaftaranAnggotaResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendaftaranAnggotas extends ListRecords
{
    protected static string $resource = PendaftaranAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('togglePendaftaran')
                ->label(fn () => \App\Models\SettingAnggota::first()?->kondisi_daftar ? 'Tutup Pendaftaran' : 'Buka Pendaftaran')
                ->color(fn () => \App\Models\SettingAnggota::first()?->kondisi_daftar ? 'danger' : 'success')
                ->icon(fn () => \App\Models\SettingAnggota::first()?->kondisi_daftar ? 'heroicon-o-lock-closed' : 'heroicon-o-lock-open')
                ->action(function () {
                    $pengaturan = \App\Models\SettingAnggota::first();
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
