<?php

namespace App\Filament\Resources\Branches\Tables;

use Filament\Actions\BulkActionGroup as ActionsBulkActionGroup;
use Filament\Actions\DeleteAction as ActionsDeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction as ActionsEditAction;
use Filament\Actions\RestoreAction as ActionsRestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class BranchesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('address')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('is_active')
                    ->badge()
                    ->formatStateUsing(
                        fn ($state) => $state->label()
                    ),

                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->placeholder('All Statuses'),

                TernaryFilter::make('deleted_at')
                    ->label('Trashed')
                    ->placeholder('All Records')
                    ->trueLabel('Only Deleted')
                    ->falseLabel('Without Deleted')
                    ->queries(
                        true: fn ($query) => $query->onlyTrashed(),
                        false: fn ($query) => $query->withoutTrashed(),
                        blank: fn ($query) => $query->withTrashed(),
                    ),
            ])
            ->actions([
                ActionsEditAction::make()
                    ->label('Edit'),
                    
                ActionsDeleteAction::make()
                    ->label('Delete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Branch')
                    ->modalDescription('Are you sure you want to delete this branch?')
                    ->modalSubmitActionLabel('Yes, Delete'),
                    
                ActionsRestoreAction::make()
                    ->label('Restore')
                    ->modalHeading('Restore Branch')
                    ->modalDescription('Are you sure you want to restore this branch?')
                    ->modalSubmitActionLabel('Yes, Restore'),
            ])
            ->bulkActions([
                ActionsBulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Delete Selected')
                        ->requiresConfirmation(),
                    RestoreBulkAction::make()
                        ->label('Restore Selected'),
                ]),
            ]);
    }
}