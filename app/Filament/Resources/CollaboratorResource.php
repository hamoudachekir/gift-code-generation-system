<?php

namespace App\Filament\Resources;

use App\Enums\QuotaPer;
use App\Filament\Resources\CollaboratorResource\Pages;
use App\Filament\Resources\CollaboratorResource\RelationManagers;
use App\Models\Collaborator;
use App\Models\Store;
use App\Models\Validity;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class CollaboratorResource extends Resource
{
    protected static ?string $model = Collaborator::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return __('Collaborateur');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Paramètres');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Infos')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nom')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\RichEditor::make('description')
                                    ->label('Description'),

                                Forms\Components\TextInput::make('email')
                                    ->label('E-mail')
                                    ->nullable()
                                    ->email()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('Phone')
                                    ->label('Mobile')
                                    ->nullable()
                                    ->tel()
                                    ->maxLength(255),

                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active ?')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->default(true),
                            ]),
                        Tab::make('Tarif')
                            ->schema([

                                Forms\Components\Toggle::make('is_free')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->label('Gratuit ?'),

                                Forms\Components\TextInput::make('price')
                                    ->label('Prix')
                                    ->required()
                                    ->stripCharacters(',')
                                    ->numeric()
                                    ->suffixIcon('heroicon-m-currency-euro'),


                                Forms\Components\TextInput::make('quota')
                                    ->label('Quota')
                                    ->required()
                                    ->numeric(),

                                Forms\Components\ToggleButtons::make('quota_per')
                                    ->inline()
                                    ->options(QuotaPer::class)
                                    ->required(),

                                // Forms\Components\Select::make('quota_per')
                                //     ->label('Quota Par')
                                //     ->options(QuotaPer::class)
                                //     ->native(false)
                                //     ->required(),
                            ]),
                        Tab::make('Configuration')
                            ->schema([

                                Forms\Components\Select::make('validities')
                                    ->label('Validités')
                                    ->relationship(
                                        name: 'validities',
                                        titleAttribute: 'title',
                                        modifyQueryUsing: fn(Builder $query) => $query->where('is_active', true),
                                    )
                                    ->searchable(['title', 'description'])
                                    ->preload()
                                    ->multiple()

                                    ->createOptionForm([
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
                                            ->onColor('success')
                                            ->offColor('danger')
                                            ->columnSpan('full'),
                                    ])

                                    ->editOptionForm([
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
                                            ->onColor('success')
                                            ->offColor('danger')
                                            ->default(true)
                                            ->columnSpan('full'),
                                    ])
                                    ->required(),

                                Forms\Components\Select::make('stores')
                                    ->label('Stores')
                                    ->options(Store::all()->pluck('store_name', 'store_id'))
                                    ->searchable(['store_name', 'store_desc'])
                                    ->preload()
                                    ->multiple()
                                    ->required(),
                            ]),
                    ])->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->description(fn(Collaborator $record): string|null => 
                                                (strlen($record->description) > 30) ? 
                                                strip_tags(substr($record->description, 0, 30)) . ' ...' : 
                                                strip_tags($record->description ?? '')),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Mobile')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('quota')
                    ->label('Quota')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('quota_per')
                    ->label('Quota Par')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Prix (TND)')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active ?')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable(),

                Tables\Columns\ToggleColumn::make('is_free')
                    ->label('Gratuit ?')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->color('info')
                        ->stickyModalHeader()
                        ->stickyModalFooter()
                        ->modalWidth(MaxWidth::FourExtraLarge)
                        ->slideOver()
                        ->closeModalByClickingAway(false),
                    Tables\Actions\EditAction::make()
                        ->color('success')
                        ->stickyModalHeader()
                        ->stickyModalFooter()
                        ->modalWidth(MaxWidth::FourExtraLarge)
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
            'index' => Pages\ManageCollaborators::route('/'),
        ];
    }
}
