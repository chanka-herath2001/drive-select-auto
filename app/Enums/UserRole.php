<?php

namespace App\Enums;

enum UserRole: int
{
    case SiteUser = 1;
    case Admin = 2;
}
