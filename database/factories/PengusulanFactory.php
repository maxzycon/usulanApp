<?php

namespace Database\Factories;

use App\Models\Pengusulan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengusulan>
 */
class PengusulanFactory extends Factory
{
    protected $model = Pengusulan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id" => $this->faker->uuid(),
            "nama" => $this->faker->name(),
            "nip" => $this->faker->randomNumber(),
            "status_usulan" => $this->faker->randomElement(["13","16","12"]),
            "jenis_layanan_nama" => $this->faker->randomElement(["Pendidikan","Golongan", "Cuti"]),
            "tgl_usulan" => $this->faker->dateTimeBetween('-1 years'),
            "instansi_nama" => $this->faker->randomElement(["Instansi 1","Instansi 2", "Instansi 3", "Instansi 4", "Instansi 5"]),
            "tipe_usulan" => $this->faker->randomElement(["I","U"]),
            "satker_approval" => $this->faker->randomElement([
                "A5EB03E24341F6A0E040640A040252AD",
                "A5EB03E24342F6A0E040640A040252AD",
                "A5EB03E24343F6A0E040640A040252AD",
                "A5EB03E24344F6A0E040640A040252AD",
                "A5EB03E24345F6A0E040640A040252AD",
                "A5EB03E24346F6A0E040640A040252AD",
                "A5EB03E24347F6A0E040640A040252AD",
                "A5EB03E24348F6A0E040640A040252AD",
                "A5EB03E24349F6A0E040640A040252AD",
                "A5EB03E2433EF6A0E040640A040252AD",
                "A5EB03E2433FF6A0E040640A040252AD",
                "A5EB03E24340F6A0E040640A040252AD",
                "ff80808147e770b20147f7a9be4876b2",
                "ff80808147e76ffd0147f7cd95973a6b",
            ]),
            "nip_validator" => $this->faker->randomNumber(),
            "nama_validator" => $this->faker->name(),
            "created_at" => now(),
        ];
    }
}
