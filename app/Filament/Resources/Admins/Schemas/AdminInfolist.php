<?php

namespace App\Filament\Resources\Admins\Schemas;

use App\Enums\IsActiveEnum;
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
                        ->badge()
                        ->formatStateUsing(fn($state) => IsActiveEnum::getLabelFromState($state))
                        ->color(fn($state) => IsActiveEnum::getColorFromState($state))
                        ->icon(fn($state) => IsActiveEnum::getIconFromState($state)),

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
