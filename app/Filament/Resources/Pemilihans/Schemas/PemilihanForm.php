<?php

namespace App\Filament\Resources\Pemilihans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PemilihanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Nama_Ketua')
                    ->label('Nama Ketua')
                    ->required(),
                TextInput::make('Nama_Wakil')
                    ->label('Nama Wakil')
                    ->required(),
                FileUpload::make('Foto_Ketua')
                    ->label('Foto Ketua')
                    ->directory('pemilihan')
                    ->disk('public')
                    ->maxSize(12000) // 12MB
                    ->helperText('Ukuran maksimal 12MB. Format: JPEG, PNG.')
                    ->image()
                    ->imageAspectRatio('3:4')
                    ->automaticallyCropImagesToAspectRatio()
                    ->panelAspectRatio('3:4')
                    ->itemPanelAspectRatio('3:4')
                    ->imagePreviewHeight(160)
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->required(),
                FileUpload::make('Foto_Wakil')
                    ->label('Foto Wakil')
                    ->directory('pemilihan')
                    ->disk('public')
                    ->maxSize(12000) // 12MB
                    ->helperText('Ukuran maksimal 12MB. Format: JPEG, PNG.')
                    ->image()
                    ->imageAspectRatio('3:4')
                    ->automaticallyCropImagesToAspectRatio()
                    ->panelAspectRatio('3:4')
                    ->itemPanelAspectRatio('3:4')
                    ->imagePreviewHeight(160)
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->required(),
                TextInput::make('Visi')
                    ->label('Visi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('Misi')
                    ->label('Misi')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
