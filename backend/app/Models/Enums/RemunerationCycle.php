<?php

namespace App\Models\Enums;

enum RemunerationCycle: string {
    case PER_TASK = 'PER TASK';
    case HOURLY = 'HOURLY';
    case DAILY = 'DAILY';
    case WEEKLY = 'WEEKLY';
    case BI_WEEKLY = 'BI-WEEKLY';
    case SEMI_MONTHLY = 'SEMI-MONTHLY';
    case MONTHLY = 'MONTHLY';
    case YEARLY = 'YEARLY';
}
