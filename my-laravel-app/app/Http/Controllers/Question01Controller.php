<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question01RegistrationInformation;

class Question01Controller extends Controller
{
     public function index() {
        return view('question01.index');
    }

    public function regist(string $token) {

        //-----< Get RegistrationInformation Data >-----
        $query = Question01RegistrationInformation::query();
        $query->where('for_regist_token', $token);
        $query->where('is_cleared', Question01RegistrationInformation::IS_CLEARED___FALSE);
        $registration_information = $query->get()->toArray();

        //-----< Invalid token  >-----
        if( empty($registration_information) ){
            return redirect('/question01');
        }


        return view('question01.regist');
    }

}
