<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = ['perusahaan','perorangan'];
        $skill = ['Bangunan','Mekanik','Furniture','Homecare','Elektronik','Perkarangan','Program','Interior'];
        $user = User::factory()->create();
        $prov = Province::inRandomOrder()->first();
        $kab = Regency::where('province_id',$prov->id)->inRandomOrder()->first();
        $kec = District::where('regency_id',$kab->id)->inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'type' => $type[rand(0,count($type)-1)],
            'nik' => rand(0,9999999999999999),
            'npwp' => rand(0,9999999999999999),
            'name' => $this->faker->company,
            'skill' => rand(0,count($skill)-1),
            'address' => $this->faker->address,
            'provinsi' => $prov->id,
            'kabupaten' => $kab->id,
            'kecamatan' => $kec->id,
            'cv' => 'http://127.0.0.1:8000/storage/cv/cv.pdf',
            'avatar' => 'http://127.0.0.1:8000/storage/avatar/avatar.jpg',
            'file' => 'http://127.0.0.1:8000/storage/avatar/file.pdf',
        ];
    }
}
