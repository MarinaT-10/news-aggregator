<?php

declare(strict_types=1);

namespace App\Enums;

enum IsAdminStatus: string
{
    case ISADMIN = 'admin';

    case ISUSER = 'user';

    public static function all(): array
    {
        return [
            self::ISADMIN->value,
            self::ISUSER->value,
        ];
    }

}

