<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('vname');
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('msme_no')->nullable();
            $table->string('msme_type')->nullable();
            $table->string('opening_balance')->nullable();
            $table->string('effective_from')->nullable();
            $table->string('active_id', 3)->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->timestamps();
            $table->unique(['vname', 'mobile']);
        });


        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->string('address_type')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('state_id')->references('id')->on('states');
            $table->foreignId('pincode_id')->references('id')->on('pincodes');
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->string('gstin')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contact_details');
    }
};

//'contact_detail_id' => $data->id,
//                        'city_name' => $data->city_name,
//                        'city_id' => $data->city_id,
//                        'state_name' => $data->state_name,
//                        'state_id' => $data->state_id,
//                        'pincode_name' => $data->pincode_name,
//                        'pincode_id' => $data->pincode_id,
//                        'country_name' => $data->country_name,
//                        'country_id' => $data->country_id,
//                        'address_1' => $data->address_1,
//                        'address_2' => $data->address_2,
//                        'gstin' => $data->gstin,
//                        'email' => $data->email,
