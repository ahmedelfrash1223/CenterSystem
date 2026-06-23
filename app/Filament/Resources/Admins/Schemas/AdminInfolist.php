<?php

namespace App\Filament\Resources\Admins\Schemas;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class AdminInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            ComponentsSection::make('Admin Details')
                ->description('Basic information about the admin')
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([

                    TextEntry::make('code')
                        ->label('Admin Code')
                        ->icon('heroicon-o-hashtag'),

                    TextEntry::make('name')
                        ->label('Full Name')
                        ->icon('heroicon-o-user'),

                    TextEntry::make('email')
                        ->label('Email Address')
                        ->icon('heroicon-o-envelope'),

                    TextEntry::make('is_active')
                        ->label('Status')
                        ->badge()
                        ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive')
                        ->color(fn($state) => $state ? 'success' : 'danger')
                        ->icon('heroicon-o-check-circle'),

                    TextEntry::make('created_at')
                        ->label('Created At')
                        ->dateTime()
                        ->icon('heroicon-o-calendar'),

                    TextEntry::make('updated_at')
                        ->label('Last Updated')
                        ->dateTime()
                        ->icon('heroicon-o-clock'),
                ]),


            ComponentsSection::make('Barcode')
                ->icon('heroicon-o-qr-code')
                ->columns(1)
                ->schema([

                    ComponentsSection::make('Barcode')
                        ->description('Scan this code to get user code')
                        ->icon('heroicon-o-qr-code')
                        ->schema([

                            ViewEntry::make('barcode')
                                ->view('filament.infolists.barcode'),
                        ]),
                ]),
        ]);
    }
}
