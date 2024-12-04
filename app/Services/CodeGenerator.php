<?php

namespace App\Services;

use Illuminate\Support\Str;
use voku\helper\ASCII;

class CodeGenerator
{
    protected ?string $key;
    protected ?string $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public static function make(?string $key, ?string $fieldValue): self
    {
        return app(static::class, ['key' => $key, 'value' => $fieldValue]);
    }

    public function generateCode(string $delimiter = '-', int $hashLength = 8): string
    {
        $value = Str::of($this->value);
        if ($value->startsWith('ال')) {
            $value = $value->replace('ال', '');
        }
        $key = Str::of($this->key)->lower()->trim()->substr(0, 3);
        $value = $value->substr(0, 5);
        $value = ASCII::to_transliterate($value);
        return implode($delimiter, [
            substr(md5($this->value), 0, $hashLength),
            $key,
            $value,
        ]);
    }
}
