<?php

namespace App\Enums;

enum UserRole: int
{
    // Backend roles
    case SuperAdministrator = 1;
    case Administrator = 2;
    case Moderator = 3;
    case VendorManager = 4;
    case MarketingManager = 5;

    // Front end roles
    case Vendor = 6;
    case Customer = 7;

}
