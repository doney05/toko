<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/province');

        $province = $response['rajaongkir']['results'];
        foreach ($province as $value) {
            Province::create([
                'title' => $value['province']
            ]);
        }

        $responseCity = Http::withHeaders([
            'key' => 'acd066adeb9c7cd8601e3ca09e4e2a51'
        ])->get('https://api.rajaongkir.com/starter/city');


        $city = $responseCity['rajaongkir']['results'];
        foreach ($city as $item) {
            City::create([
                'provinces_id' => $item['province_id'],
                'title' => $item['city_name']
            ]);
        }
    }
}
