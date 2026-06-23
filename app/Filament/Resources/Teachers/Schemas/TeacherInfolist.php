<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Enums\IsActiveEnum;
use App\Enums\UserGenderEnum;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            ComponentsSection::make('Teacher Information')
                ->description('Basic teacher details')
                ->icon('heroicon-o-academic-cap')
                ->columns(2)
                ->schema([

                    TextEntry::make('code')
                        ->label('Teacher Code')
                        ->icon('heroicon-o-hashtag'),

                    TextEntry::make('name')
                        ->label('Full Name')
                        ->icon('heroicon-o-user'),

                    TextEntry::make('email')
                        ->label('Email')
                        ->icon('heroicon-o-envelope'),

                    TextEntry::make('phone')
                        ->label('Phone')
                        ->icon('heroicon-o-phone'),

                     TextEntry::make('gender')
                        ->label('Gender')
                        ->formatStateUsing(function ($state) {
                            if ($state instanceof UserGenderEnum) {
                                return $state->label();
                            }

                            return UserGenderEnum::from((int) $state)?->label();
                        })
                        ->badge()
                        ->color(function ($state) {
                            $enum = $state instanceof UserGenderEnum
                                ? $state
                                : UserGenderEnum::from((int) $state);

                            return match ($enum) {
                                UserGenderEnum::MALE => 'info',
                                UserGenderEnum::FEMALE => 'pink',
                                default => 'gray',
                            };
                        })
                        ->icon('heroicon-o-user-circle'),

                    TextEntry::make('country')
                        ->icon('heroicon-o-globe-alt'),

                    TextEntry::make('city')
                        ->icon('heroicon-o-map-pin'),

                    TextEntry::make('qualification')
                        ->label('Qualification')
                        ->icon('heroicon-o-academic-cap'),

                    TextEntry::make('subject')
                        ->label('Subject')
                        ->icon('heroicon-o-book-open'),

                    TextEntry::make('subscription_type')
                        ->label('Subscription Type')
                        ->formatStateUsing(fn($state) => match ($state) {
                            1 => 'Personal',
                            2 => 'Institutional',
                            default => '-',
                        })
                        ->badge(),

                   TextEntry::make('is_active')
                        ->label('Status')
                        ->formatStateUsing(function ($state) {
                            if ($state instanceof IsActiveEnum) {
                                return $state->label();
                            }

                            return IsActiveEnum::from((int) $state)?->label();
                        })
                        ->badge()
                        ->color(function ($state) {
                            $enum = $state instanceof IsActiveEnum
                                ? $state
                                : IsActiveEnum::from((int) $state);

                            return match ($enum) {
                                IsActiveEnum::ACTIVE => 'success',
                                IsActiveEnum::INACTIVE => 'danger',
                                default => 'gray',
                            };
                        })
                        ->icon('heroicon-o-check-circle'),
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

            ComponentsSection::make('Branch Information')
                ->icon('heroicon-o-building-office-2')
                ->columns(2)
                ->schema([

                    TextEntry::make('branch.name')
                        ->label('Branch')
                        ->icon('heroicon-o-building-office-2'),
                ]),


        ]);
    }
}
