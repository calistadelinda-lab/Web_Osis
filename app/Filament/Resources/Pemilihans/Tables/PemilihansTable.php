<?php

namespace App\Filament\Resources\Pemilihans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PemilihansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Nama_Ketua')
                    ->label('Nama Ketua')
                    ->searchable(),
                TextColumn::make('Nama_Wakil')
                    ->label('Nama Wakil')
                    ->searchable(),
                ImageColumn::make('Foto_Ketua')
                    ->label('Foto Ketua')
                    ->disk('public')
                    ->imageWidth(60)
                    ->imageHeight(80)
                    ->extraImgAttributes(['loading' => 'lazy']),
                ImageColumn::make('Foto_Wakil')
                    ->label('Foto Wakil')
                    ->disk('public')
                    ->imageWidth(60)
                    ->imageHeight(80)
                    ->extraImgAttributes(['loading' => 'lazy']),
            TextColumn::make('jumlah_suara')
                    ->label('Jumlah Suara')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
