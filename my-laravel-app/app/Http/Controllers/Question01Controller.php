<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Question01RegistrationInformationRequest;
use App\Models\Question01RegistrationInformation;
use Exception;

class Question01Controller extends Controller
{
    /**
     *
     */
    public function index(Request $request) {
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
    public function reflectClearedUserInputData(Question01RegistrationInformationRequest $request) {

        try{
            // Save the cleared user information entered by the user.
            $registration_information = Question01RegistrationInformation::find($request->id);
            if($registration_information->is_cleared === Question01RegistrationInformation::IS_CLEARED___TRUE){
                throw new Exception();
            }
            $registration_information->name       = $request->name;
            $registration_information->comment    = $request->comment;
            $registration_information->is_cleared = Question01RegistrationInformation::IS_CLEARED___TRUE;
            $registration_information->save();

        } catch (Exception $e) {
            session()->flash('special_message', 'Sorry. An error occurred.');
            return redirect()->action('Question01Controller@index');
        }

        session()->flash('special_message', 'Thank you for your message!');
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
