<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Site Name')
                    ->searchable(),

                TextColumn::make('logo_text')
                    ->label('Logo Text'),

                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([]);
    }
}