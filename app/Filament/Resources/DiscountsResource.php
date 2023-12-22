<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountsResource\Pages;
use App\Filament\Resources\DiscountsResource\RelationManagers;
use App\Models\Discounts;
use Filament\Forms;
use Filament\Forms\Form;
//use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
//use App\Filament\Resources\DiscountsResource\RelationManagers;

class DiscountsResource extends Resource
{
    protected static ?string $model = Discounts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        //Seccion de formularios para la creacion de un descuento
        return $form
            ->schema([
                Forms\Components\Section::make('Editar descuento')
                    ->description('En esta seccion podra editar un descuento')
                    ->columns([
                        'sm' => 3,
                        'xl' => 5,
                        '2xl' => 6,
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(30),
                        Forms\Components\Toggle::make('active')
                            ->required(),
                        Forms\Components\Select::make('region_id')
                            ->options([
                                '1' => 'North America & Canada',
                                '2' => 'Europe, Middle East and Africa',
                                '3' => 'Latin America & the Caribbean',
                                '4' => 'Asia Pacific',
                            ])
                            ->required(),
                        Forms\Components\Select::make('access_type_code')
                            ->options([
                                'A' => 'Cliente Final',
                                'B' => 'Agencia',
                                'C' => 'Corporativo',
                            ])
                            ->required(),
                        Forms\Components\Select::make('brand_id')
                            ->options([
                                '1' => 'Avis',
                                '2' => 'Budget',
                                '3' => 'Payless',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('priority')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(1000)
                            ->required(),
                        Forms\Components\DatePicker::make('start_date')
                            ->required(),
                        Forms\Components\DatePicker::make('end_date')
                            ->required(),
                    ]),


            ]);
    }
    //Seccion encargada de renderizar tabla de descuentos y sus filtros
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('accessType.name'),
                Tables\Columns\TextColumn::make('active')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    })->sortable(),
                Tables\Columns\TextColumn::make('priority')
                    ->sortable(),
                Tables\Columns\TextColumn::make('discountRanges.code')
                    ->label('AWD/BCD'),
                Tables\Columns\TextColumn::make('discountRanges.discount')
                    ->label('Discount GSA'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Promotion period start'),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Promotion period end'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
            ])
            ->filters([

                SelectFilter::make('region')
                    ->options([
                        '1' => 'North America & Canada',
                        '2' => 'Europe, Middle East and Africa',
                        '3' => 'Latin America & the Caribbean',
                        '4' => 'Asia Pacific',
                    ])
                    ->attribute('region_id'),

                SelectFilter::make('brand')
                    ->options([
                        '1' => 'Avis',
                        '2' => 'Budget',
                        '3' => 'Payless',
                    ])
                    ->attribute('brand_id'),

                SelectFilter::make('Access Type')
                    ->options([
                        'A' => 'Cliente Final',
                        'B' => 'Agencia',
                        'C' => 'Corporativo',
                    ])
                    ->attribute('access_type_code'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
    //Seccion para agregar la relacion de los periodos a un descuento
    public static function getRelations(): array
    {
        return [
        
            RelationManagers\DiscountRangesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscounts::route('/create'),
            'edit' => Pages\EditDiscounts::route('/{record}/edit'),
        ];
    }
}
