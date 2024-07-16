<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceRuleResource\Pages;
use App\Filament\Resources\PriceRuleResource\RelationManagers;
use App\Models\PriceRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PriceRuleResource extends Resource
{
    protected static ?string $model = PriceRule::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

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
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(true),
                    
            ])->columns(1);
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
                    ->label('Prix (TND)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('operator')
                    ->label('Opérateur')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '>' => 'info',
                        '<' => 'warning',
                        '=' => 'success',
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('quota')
                    ->label('Quota')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active ?')
                    ->onColor('success')
                    ->offColor('danger')
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
                ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->color('info')
                        ->stickyModalHeader()
                        ->stickyModalFooter()
                        ->modalWidth(MaxWidth::Medium)
                        ->slideOver()
                        ->closeModalByClickingAway(false),
                    Tables\Actions\EditAction::make()
                        ->color('success')
                        ->stickyModalHeader()
                        ->stickyModalFooter()
                        ->modalWidth(MaxWidth::Medium)
                        ->slideOver()
                        ->closeModalByClickingAway(false),
                    Tables\Actions\DeleteAction::make(),
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
