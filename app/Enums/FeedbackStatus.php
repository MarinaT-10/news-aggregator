<?php

declare(strict_types=1);

namespace App\Enums;

enum FeedbackStatus: string
{
    case RECEIVED = 'получено';

    case INPROGRESS = 'в работе';

    case PROCESSED = 'обработано';

    public static function all(): array
    {
        return [
            self::RECEIVED->value,
            self::INPROGRESS->value,
            self::PROCESSED->value,
        ];
    }
}
