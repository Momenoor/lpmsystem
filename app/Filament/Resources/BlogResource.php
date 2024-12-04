<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\Grid as InfolistGrid;
use Filament\Infolists\Components\Split as InfolistSpilt;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label(__('admin.fields.image'))
                    ->directory('blog')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Split::make([
                    Section::make([
                        TextInput::make('title')
                            ->required()
                            ->label(__('admin.fields.title'))
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($set, $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->label(__('admin.fields.slug'))
                            ->required()
                            ->readOnly()
                            ->helperText(__('This will be the URL-friendly identifier.')),
                        RichEditor::make('content')
                            ->label(__('admin.fields.content'))
                            ->required(),
                    ]),
                    Section::make([
                        Toggle::make('is_published')
                            ->label(__('admin.fields.is_published'))
                            ->inline(false)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($set, $state) => $state ?: $set('published_at', null)),
                        DatePicker::make('published_at')
                            ->label(__('admin.fields.published_at'))
                            ->visible(fn($get) => $get('is_published'))
                            ->live(onBlur: true),
                    ])
                        ->grow(false)
                        ->extraAttributes(['style' => 'min-width:200px !important'], true),
                ])
                    ->from('md')
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('admin.fields.image'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('admin.fields.title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label(__('admin.fields.author'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label(__('admin.fields.is_published'))
                    ->boolean()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_published')
                    ->label(__('admin.fields.is_published'))
                    ->query(fn($query) => $query->isPublished()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make()
                    ->schema([
                        InfolistSpilt::make([
                            InfolistGrid::make(2)
                                ->schema([
                                    Group::make([
                                        TextEntry::make('title')
                                            ->label(__('admin.fields.title')),
                                        TextEntry::make('slug')
                                            ->label(__('admin.fields.slug')),
                                        TextEntry::make('published_at')
                                            ->label(__('admin.fields.published_at'))
                                            ->badge()
                                            ->date()
                                            ->color('success')
                                            ->hidden(fn($record) => !$record->is_published),
                                    ]),
                                    Group::make([
                                        TextEntry::make('author.name')
                                            ->label(__('admin.fields.author_by')),
                                    ]),
                                ]),
                            ImageEntry::make('image')
                                ->label(__('admin.fields.image'))
                                ->hiddenLabel()
                                ->grow(false),
                        ])->from('lg'),
                    ]),
                InfolistSection::make('Content')
                    ->schema([
                        TextEntry::make('content')
                            ->prose()
                            ->markdown()
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => BlogResource\Pages\EditBlog::route('/{record}/edit'),
            'view' => BlogResource\Pages\ViewBlog::route('/{record}'),

        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.blog.plural');
    }

    public static function getModelLabel(): string
    {
        return __('admin.resources.blog.singular');
    }
}
