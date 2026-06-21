<?php

namespace App\Filament\Resources\Branches\Schemas;

use App\Enums\IsActiveEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Branch Information')
                ->columnSpanFull()
                ->columns(2)
                ->schema([


                    TextInput::make('name')
                        ->label('Branch Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('phone')
                        ->tel()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->email()
                        ->maxLength(255),

                    Toggle::make('is_active')
                        ->label('Status')
                        ->default(true),

                    Textarea::make('address')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
