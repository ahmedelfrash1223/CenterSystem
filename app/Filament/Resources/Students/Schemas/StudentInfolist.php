<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Enums\AcademicLevelEnum;
use App\Enums\AcademicYearEnum;
use App\Enums\IsActiveEnum;
use App\Enums\UserGenderEnum;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ViewEntry;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            ComponentsSection::make('Student Information')
                ->description('Basic student details')
                ->icon('heroicon-o-academic-cap')
                ->columns(2)
                ->schema([

                    TextEntry::make('code')
                        ->label('Student Code')
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

                    TextEntry::make('parent_phone')
                        ->label('Parent Phone')
                        ->icon('heroicon-o-phone-arrow-up-right'),

                    TextEntry::make('gender')
                        ->badge()
                        ->formatStateUsing(fn($state) => UserGenderEnum::getLabelFromState($state))
                        ->color(fn($state) => UserGenderEnum::getColorFromState($state))
                        ->icon(fn($state) => UserGenderEnum::getIconFromState($state)),

                    TextEntry::make('country')
                        ->icon('heroicon-o-globe-alt'),

                    TextEntry::make('city')
                        ->icon('heroicon-o-map-pin'),

                    TextEntry::make('birth_date')
                        ->label('Birth Date')
                        ->date()
                        ->icon('heroicon-o-calendar'),


                    TextEntry::make('is_active')
                        ->badge()
                        ->formatStateUsing(fn($state) => IsActiveEnum::getLabelFromState($state))
                        ->color(fn($state) => IsActiveEnum::getColorFromState($state))
                        ->icon(fn($state) => IsActiveEnum::getIconFromState($state)),


                ]),

            ComponentsSection::make('Academic Information')
                ->description('Education details')
                ->icon('heroicon-o-book-open')
                ->columns(2)
                ->schema([

                    TextEntry::make('academic_level')
                        ->badge()
                        ->formatStateUsing(fn($state) => AcademicLevelEnum::getLabelFromState($state))
                        ->color(fn($state) => AcademicLevelEnum::getColorFromState($state))
                        ->icon(fn($state) => AcademicLevelEnum::getIconFromState($state)),

                    TextEntry::make('academic_year')
                        ->badge()
                        ->formatStateUsing(fn($state) => AcademicYearEnum::getLabelFromState($state))
                        ->color(fn($state) => AcademicYearEnum::getColorFromState($state))
                        ->icon(fn($state) => AcademicYearEnum::getIconFromState($state)),

                    TextEntry::make('edu_ins')
                        ->label('Institution')
                        ->icon('heroicon-o-building-office'),

                    TextEntry::make('branch.name')
                        ->label('Branch')
                        ->icon('heroicon-o-building-office-2'),
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


            ComponentsSection::make('System Info')
                ->icon('heroicon-o-cog-6-tooth')
                ->columns(2)
                ->schema([

                    TextEntry::make('created_at')
                        ->label('Created At')
                        ->dateTime()
                        ->icon('heroicon-o-calendar'),

                    TextEntry::make('updated_at')
                        ->label('Last Updated')
                        ->dateTime()
                        ->icon('heroicon-o-clock'),
                ]),




        ]);
    }
}
