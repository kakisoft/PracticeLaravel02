<?php

use Illuminate\Database\Seeder;
use App\Models\Question01RegistrationInformation;

class Question01RegistrationInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-----< SP Data >-----
        DB::table('question01_registration_informations')->where('name', '=', 'kakisoft')->delete();
        DB::table('question01_registration_informations')->insert([
            [
                'name' => 'kakisoft',
                'email' => 'foobar@gmail.com',
                'for_regist_token' => str_random(10),
                'comment' => 'for_test_message',
                'is_cleared' => Question01RegistrationInformation::IS_CLEARED___TRUE,
            ]
        ]);

        //-----< Normal Data >-----
        DB::table('question01_registration_informations')->insert([
            [
                'name'             => str_random(10),
                'email'            => str_random(10).'@gmail.com',
                'for_regist_token' => null,
                'comment'          => '',
                'is_cleared'       => Question01RegistrationInformation::IS_CLEARED___FALSE,
            ]
            ,[
                'name'             => str_random(10),
                'email'            => str_random(10).'@gmail.com',
                'for_regist_token' => null,
                'comment'          => '',
                'is_cleared'       => Question01RegistrationInformation::IS_CLEARED___FALSE,
            ]
        ]);

    }
}
