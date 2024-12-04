<?php

namespace App\Filament\Pages;

use App\Enums\SocialLinkIcons;
use App\Models\Setting;
use App\Services\SettingsService;
use DateTimeZone;
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Notifications\Notification;


class Settings extends Page implements HasForms
{
    use InteractsWithForms;
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $view = 'filament.pages.settings';

    public $data = [];

    public function mount()
    {
        $this->data = Setting::getAll([
            // General Settings
            'site_title' => 'Default Site Name',
            'site_logo' => null,
            'favicon' => null,
            'default_language' => 'ar',
            'timezone' => 'UTC',

            // Contact Information
            'email' => 'admin@example.com',
            'phone' => '+123456789',
            'address' => '123 Main Street, City, Country',
            'contact_page_url' => 'https://example.com/contact',

            // About Us
            'about_us_title' => 'About Us',
            'about_us_description' => 'We are a company...',
            'mission' => 'Our mission is...',
            'vision' => 'Our vision is...',

            // Footer Settings
            'footer_text' => 'Footer Text Here',
            'copyright' => '© 2024 My Company',

            // SEO Settings
            'meta_title' => 'Default Meta Title',
            'meta_description' => 'Default Meta Description',

            // Social Media Links
            'social_links' => [],

            // Theme Settings
            'primary_color' => '#1a202c',
            'secondary_color' => '#2d3748',
            'enable_dark_mode' => false,

            // Icon Boxes
            'icon_boxes' => [],
        ]);
    }

    public function getFormSchema(): array
    {
        return [
            Fieldset::make(label: __('admin.fields.general_settings'))->schema([
                // General Settings
                TextInput::make('data.site_title')
                    ->label(__('admin.fields.title'))
                    ->required()
                    ->columnSpan(2),
                FileUpload::make('data.site_logo')
                    ->label(__('admin.fields.logo'))
                    ->image(),
                FileUpload::make('data.favicon')
                    ->label(__('admin.fields.favicon'))
                    ->image()
                    ->maxSize(512),
                Select::make('data.default_language')
                    ->label(__('admin.fields.default_language'))
                    ->options([
                        'ar' => __('admin.common.arabic'),
                        'en' => 'English'
                    ]),
                Select::make('data.timezone')
                    ->label(__('admin.fields.timezone'))
                    ->options(fn() => DateTimeZone::listIdentifiers())
                    ->default('UTC'),
            ]),
            Fieldset::make(label: __('admin.fields.contact_information'))->schema([
                // Contact Information
                TextInput::make('data.email')->label(__('admin.fields.email'))->email()->required(),
                TextInput::make('data.phone')->label(__('admin.fields.phone'))->required(),
                Textarea::make('data.address')->label(__('admin.fields.address')),
                TextInput::make('data.contact_page_url')->label(__('admin.fields.contact_page_url'))->url(),
            ]),
            Fieldset::make(label: __('admin.fields.about_us'))->schema([
                // About Us
                TextInput::make('data.about_us_title')->label(__('admin.fields.title')),
                Textarea::make('data.mission')->label(__('admin.fields.our_mission'))->rows(3),
                RichEditor::make('data.about_us_description')->label(__('admin.fields.description')),
                Textarea::make('data.vision')->label(__('admin.fields.our_vision'))->rows(3),
            ]),
            Fieldset::make(label: __('admin.fields.footer'))->schema([
                // Footer Settings
                Textarea::make('data.footer_text')->label(__('admin.fields.footer_text'))->rows(3),
                TextInput::make('data.copyright')->label(__('admin.fields.copyright_text'))->required(),
            ]),
//            Fieldset::make(label:__('admin.fields.seo'))->schema([
//                // SEO Settings
//                TextInput::make('data.meta_title')->label('Meta Title'),
//                Textarea::make('data.meta_description')->label('Meta Description')->rows(3),
//            ]),
            Fieldset::make(label: __('admin.fields.social_media'))->schema([
                // Social Media Links
                Repeater::make('data.social_links')
                    ->label(__('admin.fields.social_media_links'))
                    ->schema([
                        Select::make('platform')
                            ->label(__('admin.fields.platform'))
                            ->options(
                                collect(SocialLinkIcons::cases())
                                    ->mapWithKeys(fn($platform) => [
                                        $platform->value => $platform->name,
                                    ])->toArray()
                            )
                            ->extraInputAttributes(function ($get) {
                                return ['style' => 'color: ' . SocialLinkIcons::from($get('platform'))->color()];
                            }),
                        TextInput::make('url')->label('URL')->url(),
                    ])
                    ->collapsible()
                    ->default([])
                    ->columns(2),
            ]),
            Fieldset::make(label: __('admin.fields.icon_boxes'))->schema([
                Repeater::make('data.icon_boxes')
                    ->label(__('admin.fields.icon_boxes'))
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('admin.fields.icon'))
                            ->image()
                            ->directory('settings'),
                        TextInput::make('title')->label(__('admin.fields.title'))
                            ->required(),
                        TextInput::make('description')->label(__('admin.fields.description'))
                    ])->grid(2),

            ])->columns(1),
//            Fieldset::make(label:__('admin.fields.theme'))->schema([
//                // Theme Settings
//                ColorPicker::make('data.primary_color')->label('Primary Color'),
//                ColorPicker::make('data.secondary_color')->label('Secondary Color'),
//                Toggle::make('data.enable_dark_mode')->label('Enable Dark Mode'),
//            ]),
        ];
    }

    public function saveSettings()
    {
        $data = $this->form->getState()['data'];
        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }
        SettingsService::clear();
        Notification::make()
            ->title(__('admin.notifications.settings_saved_successfully'))
            ->success()
            ->send();
    }

    protected function getActions(): array
    {
        return [
            Action::make('save')
                ->button()
                ->label(__('admin.fields.save_settings'))
                ->action('saveSettings')
                ->color('primary'),
        ];
    }

    public function getTitle(): string
    {
        return __('admin.resources.settings.plural');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.resources.settings.plural');
    }


}
