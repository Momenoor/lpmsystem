<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use App\Models\Department;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Components\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;


class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';



    public static function form(Form $form): Form
    {
        $departmentsExists = Department::query()->exists();
        return $form
            ->schema(
                $departmentsExists ? [
                    TextInput::make('name')
                        ->label(__('admin.fields.name'))
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state)))
                        ->required(),
                    TextInput::make('slug')
                        ->label(__('admin.fields.slug'))
                        ->readOnly(),
                    TextInput::make('level')
                        ->label(__('admin.fields.level'))
                        ->required(),
                    Select::make('department_id')
                        ->label(__('admin.fields.department'))
                        ->relationship('department', 'name'),
                    Grid::make()
                        ->schema([
                            RichEditor::make('description')
                                ->label(__('admin.fields.description'))
                                ->required()
                                ->columnSpan(1),
                            Grid::make(1)
                                ->schema([
                                    Select::make('subjects')
                                        ->label(__('admin.fields.subject'))
                                        ->relationship('subjects', 'name')
                                        ->multiple(),
                                    FileUpload::make('image')
                                        ->label(__('admin.fields.image')),
                                ])
                                ->columnSpan(1),
                        ]),
                    TextInput::make('duration')
                        ->label(__('admin.fields.duration'))
                        ->required(),
                    DatePicker::make('last_admission_date')
                        ->label(__('admin.fields.last_admission_date'))
                        ->required(),
                    Toggle::make('status')
                        ->label(__('admin.fields.status')),
                ]
                    : [
                    Grid::make(1)->schema([
                        Placeholder::make(__('warning'))
                            ->content(__('No departments exist. Please create a department before adding a course.'))
                            ->maxWidth('100%'),

                        Actions::make([
                            Action::make('create_department')
                                ->label(__('admin.common.create') . ' ' . __('admin.resources.department.singular'))
                                ->url(route('filament.admin.resources.departments.create'), shouldOpenInNewTab: true)
                                ->openUrlInNewTab(true),
                        ]),
                    ]),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin.fields.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('department.name')
                    ->label(__('admin.fields.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('subjects.name')
                    ->label(__('admin.fields.subject')),
                TextColumn::make('level')
                    ->label(__('admin.fields.level')),
                IconColumn::make('status')
                    ->label(__('admin.fields.status'))
                    ->boolean(),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.course.plural');
    }

    public static function getModelLabel(): string
    {
        return __('admin.resources.course.singular');
    }

}
