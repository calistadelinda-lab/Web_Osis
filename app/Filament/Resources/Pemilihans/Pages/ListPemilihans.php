<?php
namespace App\Filament\Resources\Pemilihans\Pages;

use App\Filament\Resources\Pemilihans\PemilihanResource;
use App\Models\SettingVoting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;

class ListPemilihans extends ListRecords
{
    protected static string $resource = PemilihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('toggleVoting')
                ->label(fn () => SettingVoting::first()?->is_open ? 'Tutup Voting' : 'Buka Voting')
                ->color(fn () => SettingVoting::first()?->is_open ? 'danger' : 'success')
                ->icon(fn () => SettingVoting::first()?->is_open ? 'heroicon-o-lock-closed' : 'heroicon-o-lock-open')
                ->requiresConfirmation()
                ->modalHeading(fn () => SettingVoting::first()?->is_open ? 'Tutup Voting?' : 'Buka Voting?')
                ->modalDescription(fn () => SettingVoting::first()?->is_open
                    ? 'Siswa tidak akan bisa memilih setelah voting ditutup.'
                    : 'Siswa akan bisa memilih setelah voting dibuka.')
                ->action(function () {
                    $pengaturan = SettingVoting::first();
                    if ($pengaturan) {
                        $pengaturan->update(['is_open' => ! $pengaturan->is_open]);
                        Notification::make()
                            ->title($pengaturan->fresh()->is_open ? 'Voting Dibuka' : 'Voting Ditutup')
                            ->success()
                            ->send();
                    }
                }),
        ];
    }
}