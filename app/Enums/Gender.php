<?php

namespace App\Enums;
use App\Traits\Enumable;

enum Gender: string
{
    use Enumable;
    case MALE = 'Male';
    case FEMALE = 'Female';
    public static function toArray(): array
    {
        return array_map(function ($status) {
            return $status->value;
        }, Gender::cases());
    }
}
