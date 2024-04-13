<?php

namespace Database\Seeders;

use Aaran\Common\Database\Seeders\BankSeeder;
use Aaran\Common\Database\Seeders\CitySeeder;
use Aaran\Common\Database\Seeders\ColourSeeder;
use Aaran\Common\Database\Seeders\CountrySeeder;
use Aaran\Common\Database\Seeders\DepartmentSeeder;
use Aaran\Common\Database\Seeders\HsncodeSeeder;
use Aaran\Common\Database\Seeders\LedgerSeeder;
use Aaran\Common\Database\Seeders\PincodeSeeder;
use Aaran\Common\Database\Seeders\ReceipttypeSeeder;
use Aaran\Common\Database\Seeders\SizeSeeder;
use Aaran\Common\Database\Seeders\StateSeeder;
use Aaran\Common\Database\Seeders\TransportSeeder;
use Aaran\Erp\Database\Seeders\FabricLotSeeder;
use Aaran\Master\Database\Seeders\CompanySeeder;
use Aaran\Master\Database\Seeders\ProductSeeder;
use Aaran\Orders\Database\Seeders\OrderSeeder;
use Aaran\Orders\Database\Seeders\StyleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//sys
        S01_TenantSeeder::run();
        S02_RoleSeeder::run();
        S03_UserSeeder::run();
        S04_DefaultCompanySeeder::run();
        S05_SoftVersionSeeder::run();
//common

        CitySeeder::run();
        StateSeeder::run();
        CountrySeeder::run();
        PincodeSeeder::run();
        BankSeeder::run();
        HsncodeSeeder::run();
        ColourSeeder::run();
        DepartmentSeeder::run();
        LedgerSeeder::run();
        ReceipttypeSeeder::run();
        SizeSeeder::run();
        TransportSeeder::run();

        CompanySeeder::run();
//        ContactSeeder::run();
        ProductSeeder::run();

        OrderSeeder::run();
        StyleSeeder::run();
        FabricLotSeeder::run();
    }
}
