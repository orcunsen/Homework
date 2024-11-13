<?php

namespace App\Enums;

enum Operation: string
{
    case DIRECT = 'DIRECT';
    case REFUND = 'REFUND';
    case THREE_D = '3D';
    case THREE_D_AUTH = '3DAUTH';
}
