<?php

namespace App\Enums;

enum UserRole: int
{
    // Backend roles
    case SuperAdministrator = 1;
    case Administrator = 2;
    case Salesperson = 3;
    case InventoryManager = 4;
    case MarketingManager = 5;

    // Front end roles
    case Dealer = 6;
    case Customer = 7;

}
