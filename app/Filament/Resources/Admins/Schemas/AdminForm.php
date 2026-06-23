<?php

namespace App\Filament\Resources\Admins\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            ComponentsSection::make('Admin Information')
                ->description('Enter admin details below')
                ->icon('heroicon-o-user')
                ->columnSpanFull()
                ->columns(2)
                ->schema([

                    TextInput::make('code')
                        ->label('Admin Code')
                        ->disabled()
                        ->dehydrated(false)
                        ->prefixIcon('heroicon-o-hashtag'),

                    TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->placeholder('Enter admin name')
                        ->prefixIcon('heroicon-o-user'),

                    TextInput::make('email')
                        ->label('Email Address')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->placeholder('admin@example.com')
                        ->prefixIcon('heroicon-o-envelope'),

                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->revealable()
                        ->required(fn($operation) => $operation === 'create')
                        ->dehydrated(fn($state) => filled($state))
                        ->minLength(8)
                        ->placeholder('••••••••')
                        ->prefixIcon('heroicon-o-lock-closed'),

                    TextInput::make('password_confirmation')
                        ->label('Confirm Password')
                        ->password()
                        ->revealable()
                        ->same('password')
                        ->required(fn($operation) => $operation === 'create')
                        ->visible(fn($operation) => $operation === 'create')
                        ->prefixIcon('heroicon-o-lock-closed'),
                ]),
        ]);
    }
}