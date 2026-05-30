<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Components\Group as ComponentsGroup;
use Filament\Schemas\Components\Section as ComponentsSection;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            //  GENERAL SETTINGS
            ComponentsSection::make('General Settings')
                ->description('Basic website information')
                ->icon('heroicon-o-cog-6-tooth')
                ->columns(2)
                ->schema([

                    TextInput::make('site_title')
                        ->label('Site Title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),

                    TextInput::make('site_name')
                        ->label('Site Name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),

                    TextInput::make('logo_text')
                        ->label('Logo Text')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    SpatieMediaLibraryFileUpload::make('favicon')
                        ->label('Favicon')
                        ->collection('favicon')
                        ->image()
                        ->imageEditor()
                        ->openable()
                        ->downloadable()
                        ->columnSpanFull(),
                ]),

            //  HERO SECTION
            ComponentsSection::make('Hero Section')
                ->description('Homepage hero content & design')
                ->icon('heroicon-o-sparkles')
                ->columns(2)
                ->schema([

                    Textarea::make('hero_desc')
                        ->label('Hero Description')
                        ->rows(4)
                        ->columnSpanFull()
                        ->placeholder('Write a short powerful description...'),

                    ComponentsGroup::make()
                        ->schema([

                            ColorPicker::make('hero_gradient.0')
                                ->label('Gradient Start'),

                            ColorPicker::make('hero_gradient.1')
                                ->label('Gradient End'),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    SpatieMediaLibraryFileUpload::make('hero_image')
                        ->label('Hero Image')
                        ->collection('hero_image')
                        ->image()
                        ->imageEditor()
                        ->openable()
                        ->downloadable()
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
