<?php

namespace App\Enums;

class StatusEnum
{
    const REJECTED = 'REJECTED';
    const PROGRESS = 'PROGRESS';
    const APPROVED = 'APPROVED';


    public static function values()
    {
        return [
            self::REJECTED,
            self::PROGRESS,
            self::APPROVED,
        ];
    }
}
