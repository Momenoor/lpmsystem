<?php

namespace App\Enums;

enum SocialLinkIcons: string
{
    case Facebook = 'facebook';
    case Twitter = 'twitter';
    case Instagram = 'instagram';
    case YouTube = 'youtube';
    case GooglePlus = 'google-plus';
    case LinkedIn = 'linkedin';
    case Pinterest = 'pinterest';
    case Snapchat = 'snapchat';
    case Reddit = 'reddit';
    case WhatsApp = 'whatsapp';
    case TikTok = 'tiktok';
    case Vimeo = 'vimeo';
    case SoundCloud = 'soundcloud';
    case Telegram = 'telegram';

    /**
     * Get the icon for the social platform.
     */
    public function icon(): string
    {
        return match ($this) {
            self::Facebook => 'fab fa-facebook-f',
            self::Twitter => 'fab fa-twitter',
            self::Instagram => 'fab fa-instagram',
            self::YouTube => 'fab fa-youtube',
            self::GooglePlus => 'fab fa-google-plus-g',
            self::LinkedIn => 'fab fa-linkedin-in',
            self::Pinterest => 'fab fa-pinterest-p',
            self::Snapchat => 'fab fa-snapchat-ghost',
            self::Reddit => 'fab fa-reddit-alien',
            self::WhatsApp => 'fab fa-whatsapp',
            self::TikTok => 'fab fa-tiktok',
            self::Vimeo => 'fab fa-vimeo-v',
            self::SoundCloud => 'fab fa-soundcloud',
            self::Telegram => 'fab fa-telegram-plane',
        };
    }

    /**
     * Get the color for the social platform.
     */
    public function color(): string
    {
        return match ($this) {
            self::Facebook => '#1877F2',
            self::Twitter => '#1DA1F2',
            self::Instagram => '#E1306C',
            self::YouTube => '#FF0000',
            self::GooglePlus => '#DB4437',
            self::LinkedIn => '#0A66C2',
            self::Pinterest => '#E60023',
            self::Snapchat => '#FFFC00',
            self::Reddit => '#FF4500',
            self::WhatsApp => '#25D366',
            self::TikTok => '#010101',
            self::Vimeo => '#1AB7EA',
            self::SoundCloud => '#FF3300',
            self::Telegram => '#0088CC',
        };
    }
}
