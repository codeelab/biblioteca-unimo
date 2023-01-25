<?php
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get("database/data/users.json");
        $data = json_decode($json, true);
        foreach ($data as $key => $value)
        {
            User::query()->updateOrCreate([
                "name"          => $value['name'],
                "first_name"    => $value['first_name'],
                "last_name"     => $value['last_name'],
                "email"         => $value['email'],
                "enrolment"     => $value['enrolment'],
                "password"      => Hash::make($value['password']),
                "type"          => $value['type']
            ]);
        }
    }
}
