<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ValidityResource\Pages;
use App\Filament\Resources\ValidityResource\RelationManagers;
use App\Models\Validity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValidityResource extends Resource
{
    protected static ?string $model = Validity::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return __('Validité Carte Cadeau');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Validités Carte Cadeau');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Paramètres');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('days')
                    ->label('Jour(s)')
                    ->required()
                    ->numeric()
                    ->unique(ignoreRecord: true)
                    ->columnSpan('full'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active ?')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(true)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->placeholder('Pas de description.')
                    ->html()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('days')
                    ->label('Jour(s)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active ?')
                    ->toggleable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active ?')
                    ->placeholder('Tout')
                    ->trueLabel('Les actives')
                    ->falseLabel('Les non actives')
                    ->native(false)
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
            'index' => Pages\ManageValidities::route('/'),
        ];
    }
}
