<?php

namespace App\Enum;

enum UnitType: string
{
    const APARTMENT = 'apartment';
    const HOUSE = 'house';
    const GARAGE = 'garage';
    const PARKING = 'parking';
    const CELLAR = 'cellar';
    const OTHER = 'other';
}