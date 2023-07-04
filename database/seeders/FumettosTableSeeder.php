<?php

namespace Database\Seeders;

use App\Models\Fumetto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class FumettosTableSeeder extends Seeder


{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fumetti = config("store");
        
        foreach ($fumetti as $fumetto) {
           $newFumetto= new Fumetto();

           $newFumetto->title= $fumetto["title"];
           $newFumetto->description= $fumetto["description"];
           $newFumetto->thumb= $fumetto["thumb"];
           $newFumetto->price= $fumetto["price"];
           $newFumetto->series= $fumetto["series"];
           $newFumetto->type= $fumetto["type"];
           $newFumetto->sale_date= $fumetto["sale_date"];
           $newFumetto->save();
        }
    }
}
