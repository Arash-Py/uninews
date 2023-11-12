<?php

namespace App\Enums;

enum CarFinanceType: string
{
    case increase = '1';
    case decrease = '-1';

    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function fromName(string $name): string
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }
        throw new \ValueError("$name is not a valid backing value for enum " . self::class);
    }

    public function label(): string
    {
        return match ($this) {
            self::increase => 'افزایش',
            self::decrease => 'کاهش'
        };
    }
}
