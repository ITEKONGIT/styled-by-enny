<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailableSlotResource\Pages;
use App\Models\AvailableSlot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class AvailableSlotResource extends Resource
{
    protected static ?string $model = AvailableSlot::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Appointment Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Availability Information')
                    ->schema([
                        Forms\Components\DatePicker::make('date')
                            ->required()
                            ->minDate(now())
                            ->label('Available Date'),
                        
                        Forms\Components\TimePicker::make('start_time')
                            ->required()
                            ->seconds(false)
                            ->label('Start Time'),
                        
                        Forms\Components\TimePicker::make('end_time')
                            ->required()
                            ->seconds(false)
                            ->after('start_time')
                            ->label('End Time'),
                        
                        Forms\Components\TextInput::make('max_appointments')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->label('Maximum Appointments'),
                        
                        Forms\Components\Toggle::make('is_available')
                            ->required()
                            ->default(true)
                            ->label('Available for Booking'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date('M d, Y')
                    ->sortable()
                    ->label('Date'),
                
                Tables\Columns\TextColumn::make('start_time')
                    ->time('g:i A')
                    ->label('Start Time'),
                
                Tables\Columns\TextColumn::make('end_time')
                    ->time('g:i A')
                    ->label('End Time'),
                
                Tables\Columns\TextColumn::make('booked_count')
                    ->label('Booked')
                    ->getStateUsing(fn ($record) => $record->booked_count),
                
                Tables\Columns\TextColumn::make('available_spots')
                    ->label('Available Spots')
                    ->getStateUsing(fn ($record) => $record->available_spots)
                    ->color(fn ($record) => $record->available_spots > 0 ? 'success' : 'danger'),
                
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean()
                    ->label('Active'),
            ])
            ->filters([
                Tables\Filters\Filter::make('future_dates')
                    ->query(fn ($query) => $query->where('date', '>=', today())),
                
                Tables\Filters\Filter::make('available_only')
                    ->query(fn ($query) => $query->where('is_available', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('quickDuplicate')
                    ->icon('heroicon-o-document-duplicate')
                    ->action(function (AvailableSlot $record) {
                        $newSlot = $record->replicate();
                        $newSlot->save();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('markAvailable')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['is_available' => true])),
                    Tables\Actions\BulkAction::make('markUnavailable')
                        ->icon('heroicon-o-x-circle')
                        ->action(fn ($records) => $records->each->update(['is_available' => false])),
                ]),
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
            'index' => Pages\ListAvailableSlots::route('/'),
            'create' => Pages\CreateAvailableSlot::route('/create'),
            'edit' => Pages\EditAvailableSlot::route('/{record}/edit'),
        ];
    }
}