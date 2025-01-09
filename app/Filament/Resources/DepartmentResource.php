<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2) // Two-column layout
                ->schema([
                    TextInput::make('name')
                        ->label(__('admin.fields.name'))
                        ->required()
                        ->maxLength(255),
                    Select::make('head_of_department_id')
                        ->label(__('admin.fields.head_of_department'))
                        ->relationship('headOfDepartment', 'name') // Assuming User model has a name field
                        ->searchable(),
                ]),
                Textarea::make('description')
                    ->label(__('admin.fields.description'))
                    ->rows(4)
                    ->maxLength(500),
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
                TextColumn::make('headOfDepartment.name')
                    ->label(__('admin.fields.head_of_department'))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->badge()
                    ->label(__('admin.fields.created_at'))
                    ->date('F j, Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.department.plural');
    }

    public static function getModelLabel(): string
    {
        return __('admin.resources.department.singular');
    }
}
