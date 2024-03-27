<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public static function  run(): void
    {
       Contact::create([
           'vname' => 'AARAN SOFTWARE',
           'contact_person' => 'SUNDAR',
           'mobile' => '9655227738',
           'whatsapp' => '9655227738',
           'landline' => '9655227738',
           'gstin' => '33AABBCCDDEE12x',
           'pan' =>'AABBCCDDEE',
           'email' => 'codexsun@gmail.com',
           'website' => 'www.codexsun.com',
           'address_1' => '44-1 Venkatappa Gounder Layout Main Road',
           'address_2' => 'Postal Colony',
           'city_id' => '1',
           'state_id' => '1',
           'pincode_id' => '1',
           'active_id' => '1',
           'user_id' => '1',
           'company_id'=>'1',
       ]);
    }
}
