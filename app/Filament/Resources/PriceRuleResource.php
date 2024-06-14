<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceRuleResource\Pages;
use App\Filament\Resources\PriceRuleResource\RelationManagers;
use App\Models\PriceRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PriceRuleResource extends Resource
{
    protected static ?string $model = PriceRule::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Règles de Paiement');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Paramètres');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('collaborator_id')
                    ->label('Collaborateur')
                    ->relationship(
                        name: 'collaborator', 
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->where('is_active', true),
                    )
                    ->searchable(['name', 'description'])
                    ->preload()
                    ->live()
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->label('Prix')
                    ->required()
                    ->stripCharacters(',')
                    ->numeric()
                    ->suffixIcon('heroicon-m-currency-euro'),

                Forms\Components\Select::make('operator')
                    ->label('Opérateur')
                    ->options([
                        '=' => 'Egale (=) à',
                        '>' => 'Supérieur (>) à',
                        '<' => 'Inférieur (<) à',
                    ])
                    ->native(false)
                    ->required(),

                Forms\Components\TextInput::make('quota')
                    ->label('Quota')
                    ->required()
                    ->numeric(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active ?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('collaborator.name')
                    ->label('Collaborateur')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Prix')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('operator')
                    ->label('Opérateur')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('quota')
                    ->label('Quota')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active ?')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('collaborator')
                    ->label('Collaborateur')
                    ->multiple()
                    ->relationship(
                        name: 'collaborator', 
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->where('is_active', true),
                    )
                    ->attribute('collaborator_id'),

            ])
            ->actions([

                Tables\Actions\EditAction::make()
                ->icon('heroicon-m-pencil-square')
                ->iconButton()
                ->color('info')
                ->extraAttributes([
                    'title' => 'Modifier',
                ]),
                
                Tables\Actions\DeleteAction::make()
                ->icon('heroicon-m-trash')
                ->iconButton()
                ->color('danger')
                ->extraAttributes([
                    'title' => 'Supprimer',
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePriceRules::route('/'),
        ];
    }
}
