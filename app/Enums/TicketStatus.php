<?php

namespace App\Enums;

enum TicketStatus: string
{
    case wait_for_answer = 'wait_for_answer';
    case close = 'close';
    case answered = 'answered';
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
            self::close => 'بسته',
            self::wait_for_answer => 'در انتظار پاسخ',
            self::answered => 'پاسخ داده شده'
        };
    }
}
