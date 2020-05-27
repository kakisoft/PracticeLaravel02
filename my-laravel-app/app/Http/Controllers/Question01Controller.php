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
            "number_of_cleared_users" => $number_of_cleared_users,
            "recent_cleared_users"    => $recent_cleared_users,
        ]);
    }

    /**
     *
     */
    public function winners() {

        return view('question01.winners');
    }


    /**
     *
     */
    public function reflectClearedUserInputData(Request $request) {

        // Save the cleared user information entered by the user.
        $post = Question01RegistrationInformation::find($request->user['id']);
        $post->name       = $request->user['name'];
        $post->comment    = $request->user['comment'];
        $post->is_cleared = Question01RegistrationInformation::IS_CLEARED___TRUE;
        $post->save();

        return redirect()->action('Question01Controller@winners');
    }

    /**
     *
     */
    public function inputClearedUserInfomation(string $token) {

        //-----< Get RegistrationInformation Record >-----
        $query = Question01RegistrationInformation::query();
        $query->where('for_regist_token', $token);
        $query->where('is_cleared', Question01RegistrationInformation::IS_CLEARED___FALSE);
        $registration_information = $query->first();

        //-----< Invalid token  >-----
        if( empty($registration_information) ){
            session()->flash('special_message', Question01RegistrationInformation::MESSAGE___INVALID_TOKEN);
            return redirect()->action('Question01Controller@index');
        }

        return view('question01.input_cleared_users_infomation')->with('registration_information', $registration_information);
    }

}
