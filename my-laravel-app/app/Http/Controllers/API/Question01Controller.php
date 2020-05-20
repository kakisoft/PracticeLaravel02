<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Services\CallMeAPI01;
use App\Models\Question01RegistrationInformation;

class Question01Controller extends Controller
{
    public function callMeGet() {
        return Question01RegistrationInformation::callMeGet();
    }

    public function callMePost() {
        return Question01RegistrationInformation::callMePost();
    }

    public function challenge_usersGet() {
        return Question01RegistrationInformation::challenge_usersGet();
    }

    public function challenge_usersPost(Request $request) {
        $name  = $request->input('name');
        $email = $request->input('email');
        return Question01RegistrationInformation::challenge_usersPost($name, $email);
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


{"message": "Thanks! Please access to http://challenge-your-limits.herokuapp.com/challenge_users/token/2wZF4BoFTOU  from your web browser."}

//=========================== error ==================================

$ curl -s -X POST -d "name=B810O63g&email=kakisttsssab" https://challenge-your-limits.herokuapp.com/challenge_users
{"message":"Validation Error, [:email, \"is invalid\"]"}

$ curl -s -X POST -d "name=B810O63g&email=kakisttab@gmail.com" https://challenge-your-limits.herokuapp.com/challenge_users
{"message":"Validation Error, [:email, \"is already taken\"]"}


{"message":"No No. Not this way"}


"Method Not Allowed"


*/
