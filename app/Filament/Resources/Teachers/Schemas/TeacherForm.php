<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Teacher Information')
                ->description('Enter teacher details and account settings')
                ->icon('heroicon-o-academic-cap')
                ->columnSpanFull()
                ->columns(2)
                ->schema([

                    TextInput::make('code')
                        ->label('Teacher Code')
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
                        ->placeholder('Enter teacher name')
                        ->prefixIcon('heroicon-o-user'),

                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->placeholder('teacher@example.com')
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
                        ->tel()
                        ->prefixIcon('heroicon-o-phone'),

                    TextInput::make('country')
                        ->prefixIcon('heroicon-o-globe-alt'),

                    TextInput::make('city')
                        ->prefixIcon('heroicon-o-map-pin'),

                    Select::make('gender')
                        ->options([
                            1 => 'Male',
                            2 => 'Female',
                        ])
                        ->prefixIcon('heroicon-o-user-circle'),

                    TextInput::make('qualification')
                        ->label('Qualification')
                        ->prefixIcon('heroicon-o-academic-cap'),

                    TextInput::make('subject')
                        ->label('Subject')
                        ->prefixIcon('heroicon-o-book-open'),

                    Select::make('subscription_type')
                        ->label('Subscription Type')
                        ->options([
                            1 => 'Personal',
                            2 => 'Institutional',
                        ])
                        ->prefixIcon('heroicon-o-credit-card'),

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