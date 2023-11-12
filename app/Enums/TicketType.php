<?php

namespace App\Enums;

enum TicketType: string
{
    case simple = 'simple';
    case leave_request = 'leave_request';
    case loan = 'loan';
    case cloth = 'cloth';
    case device = 'device';
    case impress = 'impress';
    case checkout = 'checkout';

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
            self::simple => 'تیکت',
            self::leave_request => 'مرخصی',
            self::loan => 'وام',
            self::cloth => 'لباس',
            self::device => 'دستگاه',
            self::impress => 'مساعده',
            self::checkout => 'تسویه',
        };
    }
}
