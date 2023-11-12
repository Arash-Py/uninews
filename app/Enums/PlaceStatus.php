<?php

namespace App\Enums;

enum PlaceStatus: string
{
    case available = 'available';
    case unavailable = 'unavailable';
    case disabled = 'disabled';

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
            self::available => 'خالی',
            self::unavailable => 'پر',
            self::disabled => 'مسدود',
        };
    }
}
