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
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValidityResource extends Resource
{
    protected static ?string $model = Validity::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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

                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('days')
                    ->label('Jour(s)')
                    ->required()
                    ->numeric()
                    ->unique()
                    ->columnSpan('full'),

                Forms\Components\Toggle::make('is_active')
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
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-m-pencil-square')
                    ->iconButton()
                    ->color('info')
                    ->extraAttributes([
                        'title' => 'Modifier',
                    ])
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['updated_by'] = auth()->id();
                 
                        return $data;
                    })
                    ->stickyModalHeader()
                    ->stickyModalFooter()
                    ->modalWidth(MaxWidth::Medium)
                    ->slideOver(),
                    
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
            'index' => Pages\ManageValidities::route('/'),
        ];
    }
}
