<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\kategoris;
use App\Models\menu;
use App\Models\menus;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'password'=> bcrypt('admin123'),
        'role'=>'admin',
       ]);
       User::create([
        'name'=>'owner',
        'email'=>'owner@gmail.com',
        'role'=>'owner',
        'password'=>bcrypt('owner123'),
       ]);
       User::create([
        'name'=>'kasir',
        'email'=>'kasir@gmail.com',
        'role'=>'kasir',
        'password'=>bcrypt('kasir123'),
       ]);
       User::create([
        'name'=>'user',
        'email'=>'user@gmail.com',
        'role'=>'user',
        'password'=>bcrypt('user123'),
       ]);
       Kategori::create([
        'name'=>'Makanan',
       ]);
       Kategori::create([
        'name'=>'Minuman',
       ]);
       Menu::Create([
        'nama'=>'Takoyaki',
        'foto'=>'img/takoyaki.jpg',
        'harga'=>20.000,
        'kategori_id'=>1,
        'catatan'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque voluptatibus voluptas eum distinctio quis quam quasi, cupiditate nesciunt sint ipsa eaque omnis laborum corporis rerum. Reprehenderit rerum nisi eos!',
        'user_id' => '1'
       ]);

       Menu::Create([
        'nama'=>'Sushi',
        'foto'=>'img/Sushi.jpg',
        'harga'=>25.000,
        'kategori_id'=>1,
        'catatan'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque voluptatibus voluptas eum distinctio quis quam quasi, cupiditate nesciunt sint ipsa eaque omnis laborum corporis rerum. Reprehenderit rerum nisi eos!',
        'user_id' => '1'
    ]);

       Menu::Create([
        'nama'=>'Ramen',
        'foto'=>'img/ramen.jpg',
        'harga'=>20.000,
        'kategori_id'=>1,
        'catatan'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque voluptatibus voluptas eum distinctio quis quam quasi, cupiditate nesciunt sint ipsa eaque omnis laborum corporis rerum. Reprehenderit rerum nisi eos!',
        'user_id' => '1'
    ]);

       Menu::Create([
        'nama'=>'Matcha Tea',
        'foto'=>'img/matcha.jpg',
        'harga'=>15.000,
        'kategori_id'=>2,
        'catatan'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque voluptatibus voluptas eum distinctio quis quam quasi, cupiditate nesciunt sint ipsa eaque omnis laborum corporis rerum. Reprehenderit rerum nisi eos!',
        'user_id' => '1'
    ]);

       Menu::Create([
        'nama'=>'Apple Tea',
        'foto'=>'img/apple.jpg',
        'harga'=>15.000,
        'kategori_id'=>2,
        'catatan'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque voluptatibus voluptas eum distinctio quis quam quasi, cupiditate nesciunt sint ipsa eaque omnis laborum corporis rerum. Reprehenderit rerum nisi eos!',
        'user_id' => '1'
    ]);

       Menu::Create([
        'nama'=>'American Coffee',
        'foto'=>'img/americano.jpg',
        'harga'=>15.000,
        'kategori_id'=>2,
        'catatan'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, cumque voluptatibus voluptas eum distinctio quis quam quasi, cupiditate nesciunt sint ipsa eaque omnis laborum corporis rerum. Reprehenderit rerum nisi eos!',
        'user_id' => '1'
    ]);
    }
}
