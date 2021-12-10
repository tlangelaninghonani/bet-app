<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Book;
use App\Models\Ticket;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->save();

        $book = new Book();
        $book->price = 1;
        $book->save();

        for ($i=0; $i < 10; $i++) { 
            $ticket = new Ticket();
            $ticket->ticket_number = rand(1, 9999999999);   
            $ticket->save();
        }
    }
}
