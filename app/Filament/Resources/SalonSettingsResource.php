<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalonSettingsResource\Pages;
use App\Models\SalonSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SalonSettingsResource extends Resource
{
    protected static ?string $model = SalonSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = 'settings';

    // Make it a singleton - only one settings record
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Working Hours')
                    ->description('Set your regular working hours')
                    ->schema([
                        Forms\Components\Repeater::make('working_hours')
                            ->schema([
                                Forms\Components\Select::make('day')
                                    ->options([
                                        'monday' => 'Monday',
                                        'tuesday' => 'Tuesday',
                                        'wednesday' => 'Wednesday',
                                        'thursday' => 'Thursday',
                                        'friday' => 'Friday',
                                        'saturday' => 'Saturday',
                                        'sunday' => 'Sunday',
                                    ])
                                    ->required(),
                                Forms\Components\TimePicker::make('open')
                                    ->required()
                                    ->seconds(false),
                                Forms\Components\TimePicker::make('close')
                                    ->required()
                                    ->seconds(false),
                                Forms\Components\Toggle::make('closed')
                                    ->label('Closed for the day?')
                                    ->reactive(),
                            ])
                            ->columns(4)
                            ->defaultItems(7)
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Booking Policies')
                    ->schema([
                        Forms\Components\Textarea::make('cancellation_policy')
                            ->maxLength(65535)
                            ->label('Cancellation Policy')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('cancellation_hours')
                            ->numeric()
                            ->minValue(0)
                            ->suffix('hours')
                            ->helperText('How many hours in advance can a customer cancel?')
                            ->label('Cancellation Notice'),
                        
                        Forms\Components\Textarea::make('booking_rules')
                            ->maxLength(65535)
                            ->label('Booking Rules & Notes')
                            ->columnSpanFull(),
                    ])->columns(2),
                
                Forms\Components\Section::make('Notification Settings')
                    ->schema([
                        Forms\Components\Toggle::make('email_notifications')
                            ->label('Enable Email Notifications')
                            ->default(true),
                        
                        Forms\Components\Toggle::make('sms_notifications')
                            ->label('Enable SMS Notifications')
                            ->default(false),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cancellation_hours')
                    ->label('Cancellation Notice')
                    ->suffix(' hours'),
                
                Tables\Columns\IconColumn::make('email_notifications')
                    ->boolean()
                    ->label('Email Notifications'),
                
                Tables\Columns\IconColumn::make('sms_notifications')
                    ->boolean()
                    ->label('SMS Notifications'),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Last Updated'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // No bulk actions for singleton
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSalonSettings::route('/'),
            'edit' => Pages\EditSalonSettings::route('/{record}/edit'),
        ];
    }
}