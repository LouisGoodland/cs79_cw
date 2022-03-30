<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Account;
        $a->name = "account1";
        $a->save();

        $b = new Account;
        $b->name = "account2";
        $b->save();

        $c = new Account;
        $c->name = "account3";
        $c->save();
    }
}
