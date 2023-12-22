<?php

namespace App\Filament\Resources\DiscountsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Rules\MaxThreeSubmissions;

class DiscountRangesRelationManager extends RelationManager
{
    protected static string $relationship = 'discountRanges';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Placeholder::make('description')
                    ->content('Desde esta seccion podra cargar descuentos promocionales AWD / BSD'),
                Forms\Components\Tabs::make('Label')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Periodo de aplicacion')
                            ->schema([
                                Forms\Components\TextInput::make('code')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('discount')
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->numeric(),
                                Forms\Components\TextInput::make('from_days') // Agregar campo from_days
                                    ->required()
                                    ->numeric() // Aplicar restricción numérica aquí
                                    ->minValue(0),
                                Forms\Components\TextInput::make('to_days') // Agregar campo to_days
                                    ->required()
                                    ->numeric() // Aplicar restricción numérica aquí
                                    ->minValue(0),
                            ]),
                    ])
                    ->columnSpan('full')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ranges')
            ->columns([
                Tables\Columns\TextColumn::make('from_days'),
                Tables\Columns\TextColumn::make('to_days'),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('discount'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
