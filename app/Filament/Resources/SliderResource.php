<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                    ->label(__('admin.fields.image'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->label(__('admin.fields.title'))
                    ->required(),
                Forms\Components\Repeater::make('subtitle')
                    ->simple(
                        Forms\Components\TextInput::make('subtitle')
                            ->label(__('admin.fields.subtitle'))
                    )
                    ->addActionLabel(__('admin.common.create')),
                Forms\Components\TextInput::make('link')
                    ->label(__('admin.fields.link'))
                    ->required(),
                Forms\Components\TextInput::make('link_text')
                    ->label(__('admin.fields.link_text'))
                    ->default(__('admin.common.click_here')),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label(__('admin.fields.image')),
                TextColumn::make('title')
                    ->label(__('admin.fields.title')),
                TextColumn::make('subtitle')
                    ->label(__('admin.fields.subtitle'))
                    ->html(),
                TextColumn::make('link')
                    ->label(__('admin.fields.link')),
                TextColumn::make('link_text')
                    ->label(__('admin.fields.link_text')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.slider.plural');
    }

    public static function getModelLabel(): string
    {
        return __('admin.resources.slider.singular');
    }
}
