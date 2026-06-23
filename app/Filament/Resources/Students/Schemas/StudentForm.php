<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Enums\AcademicLevelEnum;
use App\Enums\AcademicYearEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Student Information')
                ->description('Enter student personal and academic details')
                ->icon('heroicon-o-academic-cap')
                ->columnSpanFull()
                ->columns(2)
                ->schema([

                    TextInput::make('code')
                        ->label('Student Code')
                        ->disabled()
                        ->dehydrated(false)
                        ->prefixIcon('heroicon-o-hashtag'),

                    Toggle::make('is_active')
                        ->label('Active Status')
                        ->default(true)
                        ->inline(false),

                    TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->placeholder('Enter student name')
                        ->prefixIcon('heroicon-o-user'),

                    TextInput::make('email')
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->placeholder('student@example.com')
                        ->prefixIcon('heroicon-o-envelope'),

                    TextInput::make('password')
                        ->password()
                        ->revealable()
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn ($operation) => $operation === 'create')
                        ->minLength(8)
                        ->placeholder('••••••••')
                        ->prefixIcon('heroicon-o-lock-closed'),

                    TextInput::make('phone')
                        ->label('Phone Number')
                        ->tel()
                        ->prefixIcon('heroicon-o-phone'),

                    TextInput::make('parent_phone')
                        ->label('Parent Phone')
                        ->tel()
                        ->prefixIcon('heroicon-o-phone-arrow-up-right'),

                    TextInput::make('country')
                        ->prefixIcon('heroicon-o-globe-alt'),

                    TextInput::make('city')
                        ->prefixIcon('heroicon-o-map-pin'),

                    Select::make('gender')
                        ->options([
                            1 => 'Male',
                            2 => 'Female',
                        ])
                        ->required()
                        ->prefixIcon('heroicon-o-user-circle'),

                    DatePicker::make('birth_date')
                        ->label('Birth Date')
                        ->prefixIcon('heroicon-o-calendar'),

                    Select::make('academic_level')
                        ->label('Academic Level')
                        ->options(
                            collect(AcademicLevelEnum::cases())
                                ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
                        )
                        ->prefixIcon('heroicon-o-academic-cap'),

                    Select::make('academic_year')
                        ->label('Academic Year')
                        ->options(
                            collect(AcademicYearEnum::cases())
                                ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
                        )
                        ->prefixIcon('heroicon-o-calendar-days'),

                    TextInput::make('edu_ins')
                        ->label('Educational Institution')
                        ->prefixIcon('heroicon-o-building-office'),

                    Select::make('branch_id')
                        ->relationship(
                            'branch',
                            'name',
                            fn ($query) => $query
                                ->where('is_active', 1)
                                ->whereNull('deleted_at')
                        )
                        ->searchable()
                        ->preload()
                        ->prefixIcon('heroicon-o-building-office-2'),
                ]),
        ]);
    }
}