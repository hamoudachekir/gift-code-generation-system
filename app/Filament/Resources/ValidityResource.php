<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ValidityResource\Pages;
use App\Filament\Resources\ValidityResource\RelationManagers;
use App\Models\Validity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValidityResource extends Resource
{
    protected static ?string $model = Validity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

  
    public static function getModelLabel(): string
    {
        return __('Validité');
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

                Forms\Components\Textarea::make('description')
                ->label('Description')
                ->columnSpan('full'),

                Forms\Components\TextInput::make('days')
                ->label('Jour(s)')
                ->required()
                ->numeric()
                ->columnSpan('full'),

                Forms\Components\Checkbox::make('is_active')
                ->label('Active ?')
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
                ->sortable(),

                Tables\Columns\TextColumn::make('description')
                ->label('Description'),

                Tables\Columns\TextColumn::make('days')
                ->label('Jour(s)')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('is_active')
                ->label('Active ?'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->icon('heroicon-m-pencil-square')
                ->iconButton()
                ->color('info')
                ->size(ActionSize::Large)
                ->extraAttributes([
                    'title' => 'Modifier',
                    'class' => 'mx-auto my-8',
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListValidities::route('/'),
            'create' => Pages\CreateValidity::route('/create'),
            'edit' => Pages\EditValidity::route('/{record}/edit'),
        ];
    }


}
