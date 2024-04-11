<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public static function  run(): void
    {
       Contact::create([
           'vname' => '-',
           'contact_person' => '-',
           'mobile' => '-',
           'whatsapp' => '-',
           'gstin' => '-',
           'email' => '-',
           'address_1' => '-',
           'address_2' => '-',
           'city_id' => '1',
           'state_id' => '1',
           'pincode_id' => '1',
           'active_id' => '1',
           'user_id' => '1',
           'company_id'=>'1',
       ]);
    }
}
