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

                    TextEntry::make('birth_date')
                        ->label('Birth Date')
                        ->date()
                        ->icon('heroicon-o-calendar'),


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

            ComponentsSection::make('Academic Information')
                ->description('Education details')
                ->icon('heroicon-o-book-open')
                ->columns(2)
                ->schema([



                    TextEntry::make('academic_level')
                        ->label('Academic Level')
                        ->formatStateUsing(function ($state) {
                            if ($state instanceof AcademicLevelEnum) {
                                return $state->label();
                            }

                            return AcademicLevelEnum::from((int) $state)?->label();
                        })
                        ->badge()
                        ->color(function ($state) {
                            $enum = $state instanceof AcademicLevelEnum
                                ? $state
                                : AcademicLevelEnum::from((int) $state);

                            return match ($enum) {
                                AcademicLevelEnum::PRIMARY => 'info',
                                AcademicLevelEnum::PREPARATORY => 'warning',
                                AcademicLevelEnum::SECONDARY => 'danger',
                                AcademicLevelEnum::UNIVERSITY => 'success',
                                default => 'gray',
                            };
                        })
                        ->icon('heroicon-o-academic-cap'),



                    TextEntry::make('academic_year')
                        ->label('Academic Year')
                        ->formatStateUsing(function ($state) {
                            if ($state instanceof AcademicYearEnum) {
                                return $state->label();
                            }

                            return AcademicYearEnum::from((int) $state)?->label();
                        })
                        ->badge()
                        ->color(function ($state) {
                            $enum = $state instanceof AcademicYearEnum
                                ? $state
                                : AcademicYearEnum::from((int) $state);

                            return match ($enum) {
                                AcademicYearEnum::FIRST => 'info',
                                AcademicYearEnum::SECOND => 'warning',
                                AcademicYearEnum::THIRD => 'danger',
                                AcademicYearEnum::FOURTH => 'success',
                                AcademicYearEnum::FIFTH => 'primary',
                                AcademicYearEnum::SIXTH => 'secondary',
                                
                                default => 'gray',
                            };
                        })
                        ->icon('heroicon-o-academic-cap'),

                    TextEntry::make('edu_ins')
                        ->label('Institution')
                        ->icon('heroicon-o-building-office'),

                    TextEntry::make('branch.name')
                        ->label('Branch')
                        ->icon('heroicon-o-building-office-2'),
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
