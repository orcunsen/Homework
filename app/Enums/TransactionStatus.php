<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case APPROVED = 'APPROVED';
    case WAITING = 'WAITING';
    case DECLINED = 'DECLINED';
    case ERROR = 'ERROR';
}
