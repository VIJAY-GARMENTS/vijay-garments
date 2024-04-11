<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public static function  run(): void
    {
       Company::create([
           'vname' => 'CODEXSUN',
           'display_name' => 'CODEXSUN',
           'address_1' => '44-1 Venkatappa Gounder Layout Main Road',
           'address_2' => 'Postal Colony',
           'mobile' => '9655227738',
           'landline' => '9655227738',
           'gstin' => '33AABBCCDDEE12x',
           'pan' =>'AABBCCDDEE',
           'email' => 'codexsun@gmail.com',
           'website' => 'www.codexsun.com',
           'city_id' => '1',
           'state_id' => '1',
           'pincode_id' => '1',
           'active_id' => '1',
           'user_id' => '1',
           'tenant_id'=>'1',
           'logo' => 'codexsun'
       ]);
    }
}
