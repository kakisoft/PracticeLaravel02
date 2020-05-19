<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CallMeAPI01;

class CallMeAPIController extends Controller
{
    public function callMeGet() {
        return CallMeAPI01::callMeGet();
    }

    public function callMePost() {
        return CallMeAPI01::callMePost();
    }

    public function challenge_usersGet() {
        return CallMeAPI01::challenge_usersGet();
    }

    public function challenge_usersPost(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        return CallMeAPI01::challenge_usersPost($name, $email);
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
