<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VCardPsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\VCard::create([
            'firstname' => Str::random(10),
            'lastname'=> Str::random(10),
            'company' => Str::random(10).' Ltda.',
            'jobtitle' => Str::random(15),
            'role' => Str::random(12),
            'email' => Str::random(10).'@gmail.com',
            'phonenumber' => hexdec(uniqid()),
            'phonenumber_sec' => hexdec(uniqid()),
            'address' => Str::random(15),
            'label' => 'Streat',
            'url' => 'www.'.Str::random(8).'.com.br',            
        ]);
    }
}
