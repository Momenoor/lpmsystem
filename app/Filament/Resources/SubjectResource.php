<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Models\Subject;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Services\CodeGenerator;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('admin.fields.name'))
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, $state) => $set('code', CodeGenerator::make('subject', $state)->generateCode())),
                TextInput::make('code')
                    ->label(__('admin.fields.code'))
                    ->required()
                    ->unique('subjects', 'code')
                    ->readOnly(), // Ensure uniqueness
                Textarea::make('description')
                    ->label(__('admin.fields.description'))
                    ->rows(4)
                    ->nullable(),
                Toggle::make('status')
                    ->label(__('admin.fields.status'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin.fields.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('code')
                    ->label(__('admin.fields.code'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->label(__('admin.fields.description'))
                    ->limit(50), // Show a preview of the description
                IconColumn::make('status')
                    ->boolean()
                    ->label(__('admin.fields.status'))
                    ->sortable(),
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.subject.plural');
    }

    public static function getModelLabel(): string
    {
        return __('admin.resources.subject.singular');
    }
}
