<?php

namespace App\Enums;

enum ContraceptiveMethod: string
{
    case ORALPILLS = 'OralPills';
    case INJECTABLES = 'Injectables';
    case IMPLANTS = 'Implants';
    case IUDS = 'IUDs';
}
