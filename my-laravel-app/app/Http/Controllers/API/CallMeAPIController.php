<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallMeAPIController extends Controller
{
    public function callMeGet() {
        $return_contents = [];
        $return_contents['message'] = "Almost! It's not GET. Keep trying.";

        return $return_contents;
    }

    public function callMePost() {
        $return_contents = [];
        $return_contents['message'] = "Great! Please register as /challenge_users";

        return $return_contents;
    }

    public function challenge_usersGet() {
        $return_contents = [];
        $return_contents['message'] = "GET? No. No.";

        return $return_contents;
    }

    public function challenge_usersPost(Request $request) {
        $return_contents = [];

        // name blank
        $name = $request->input('name');
        if( is_null($name) ){
            $return_contents['message'] = "Validation Error, [:name, \"can't be blank\"]";
            return $return_contents;
        }

        // name already used


        // emal blank
        $email = $request->input('email');
        if( is_null($email) ){
            $return_contents['message'] = "Validation Error, [:email, \"can't be blank\"]";
            return $return_contents;
        }

        // email
        if( filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $return_contents['message'] = "Validation Error, [:email, \"is invalid\"]";
            return $return_contents;
        }

        // email already used

        // {"message":"Thanks! Please access to http://challenge-your-limits.herokuapp.com/challenge_users/token/M-ED_X9MVEQ  from your web browser."}



        $return_contents['message'] = "OK!";


        return $return_contents;
    }


}

/*

curl https://challenge-your-limits.herokuapp.com/call/me
curl -X POST https://challenge-your-limits.herokuapp.com/call/me
curl https://challenge-your-limits.herokuapp.com/challenge_users
curl -X POST https://challenge-your-limits.herokuapp.com/challenge_users
curl -X POST -d "name=B810O63g" https://challenge-your-limits.herokuapp.com/challenge_users
curl -s -X POST -d "name=B810O63g&email=B810O63g@gmail.com" https://challenge-your-limits.herokuapp.com/challenge_users

curl -s -X POST -d "name=B810O63g&email=B810O63g@gmail.com" https://challenge-your-limits.herokuapp.com/challenge_users
{"message":"Thanks! Please access to http://challenge-your-limits.herokuapp.com/challenge_users/token/rFkUwKhfSj0  from your web browser."}


=========================================================

curl http://localhost:8000/api/call/me
curl -X POST http://localhost:8000/api/call/me
curl http://localhost:8000/api/challenge_users
curl -X POST http://localhost:8000/api/challenge_users
curl -X POST -d "name=B810O63g" http://localhost:8000/api/challenge_users
curl -s -X POST -d "name=B810O63g&email=B810O63g@gmail.com" http://localhost:8000/api/challenge_users

curl -s -X POST -d "name=B810O63g&email=B810O63g@gmail.com" http://localhost:8000/api/challenge_users
{"message":"Thanks! Please access to http://challenge-your-limits.herokuapp.com/challenge_users/token/rFkUwKhfSj0  from your web browser."}




//=========================== error ==================================

$ curl -s -X POST -d "name=B810O63g&email=kakisttsssab" https://challenge-your-limits.herokuapp.com/challenge_users
{"message":"Validation Error, [:email, \"is invalid\"]"}

$ curl -s -X POST -d "name=B810O63g&email=kakisttab@gmail.com" https://challenge-your-limits.herokuapp.com/challenge_users
{"message":"Validation Error, [:email, \"is already taken\"]"}


{"message":"No No. Not this way"}

*/
