<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question01RegistrationInformation;

class Question01Controller extends Controller
{
    /**
     *
     */
    public function index(Request $request) {
        $special_message = $request->special_message ?? '';
        $number_of_cleared_users = Question01RegistrationInformation::where('is_cleared', Question01RegistrationInformation::IS_CLEARED___TRUE)->count();
        $recent_cleared_users = Question01RegistrationInformation::where('is_cleared', Question01RegistrationInformation::IS_CLEARED___TRUE)
                                                                    ->orderBy('created_at', 'desc')->get();

        return view('question01.index')->with([
            "special_message"         => $special_message,
            "number_of_cleared_users" => $number_of_cleared_users,
            "recent_cleared_users"    => $recent_cleared_users,
        ]);
    }

    /**
     *
     */
    public function input_cleared_user_infomation(string $token) {

        //-----< Get RegistrationInformation Data >-----
        $query = Question01RegistrationInformation::query();
        $query->where('for_regist_token', $token);
        $query->where('is_cleared', Question01RegistrationInformation::IS_CLEARED___FALSE);
        $registration_information = $query->get()->toArray();

        //-----< Invalid token  >-----
        if( empty($registration_information) ){
            return redirect()->action(
                'Question01Controller@index', ['special_message' => Question01RegistrationInformation::MESSAGE___INVALID_TOKEN]
            );
        }

        return view('question01.regist');
    }

}
