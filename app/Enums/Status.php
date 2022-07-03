<?php

namespace App\Enums;

enum Status: int
{
    case OPEN = 1; 
    case IN_PROGRESS = 2; 
    case BLOCKED = 3;
    case CANCELLED = 4;
    case COMPLETED = 5;

    public function text(): string
    {
        return match($this) {
            self::OPEN => 'Open', 
            self::IN_PROGRESS => 'In Progress', 
            self::BLOCKED => 'Blocked', 
            self::CANCELLED => 'Cancelled', 
            self::COMPLETED => 'Completed'
        };
    }
}