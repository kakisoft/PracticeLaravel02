<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property string   $name
 * @property string   $email
 * @property string   $for_regist_token
 * @property string   $comment
 * @property boolean  $is_cleared
 * @property datetime $created_at
 * @property datetime $updated_at
 *
 * @method static callMeGet()
 * @method static int count()
 * @method static Collection where(string $key, $val)
 */
class Question01RegistrationInformation extends Model
{
    //------------------------------------------
    //          Parameter Definition
    //------------------------------------------
    const IS_CLEARED___TRUE  = 1;
    const IS_CLEARED___FALSE = 0;


    //------------------------------------------
    //            Message Definition
    //------------------------------------------
    const MESSAGE___404_ERROR = "No No. Not this way";
    const MESSAGE___405_ERROR = "Sorry. This method is not allowed.";
    const MESSAGE___SERVER_ERROR  = "Sorry. A server error occurred...  The administrator confirms this issue.";
    const MESSAGE___INVALID_TOKEN = "Your token is not valid.";

    const MESSAGE___CALL_ME_GET         = "Almost! It's not GET. Keep trying.";
    const MESSAGE___CALL_ME_POST        = "Great! Please register as /challenge_users";
    const MESSAGE___CHALLENGE_USERS_GET = "GET? No. No.";

    const MESSAGE___CHALLENGE_USERS_POST___NAME_BLANK         = "Validation Error, [:name, \"can't be blank\"]";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_BLANK        = "Validation Error, [:email, \"can't be blank\"]";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_ALREADY_USED = "email already taken";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_INVALID      = "Validation Error, [:email, \"is invalid\"]";

    const MESSAGE___CHALLENGE_USERS_POST___CLEAR_MESSAGE      = "Thanks! Please access to %s/question01/challenge_users/token/%s  from your web browser.";

    /**
     *
     */
    public static function callMeGet(): string
    {
        $return_contents = [];
        $return_contents['message'] = self::MESSAGE___CALL_ME_GET;
        $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);

        return $encoded_return_contents;
    }

    /**
     *
     */
    public static function callMePost(): string
    {
        $return_contents = [];
        $return_contents['message'] = self::MESSAGE___CALL_ME_POST;
        $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);

        return $encoded_return_contents;
    }

    /**
     *
     */
    public static function challenge_usersGet(): string
    {
        $return_contents = [];
        $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_GET;
        $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);

        return $encoded_return_contents;
    }

    /**
     *
     */
    public static function challenge_usersPost(?string $name, ?string $email)
    {
        $encoded_return_contents = null;

        //----------( Check for invalid input )----------
        $hasInvaliedInput = self::getHasInvalidInputStatus($encoded_return_contents, $name, $email);
        if($hasInvaliedInput){
            // return if there is invalid input.
            return $encoded_return_contents;
        }


        //----------( create cleared users infomation )----------
        self::store($encoded_return_contents, $name, $email);
        return $encoded_return_contents;
    }

    /**
     *
     */
    private static function getHasInvalidInputStatus(&$encoded_return_contents, ?string $name, ?string $email)
    {
        $return_contents = [];

        //-----( name is blank )-----
        if( empty($name) ){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___NAME_BLANK;
            $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);
            return true;
        }

        //-----( email is blank )-----
        if( is_null($email) ){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___EMAIL_BLANK;
            $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);
            return true;
        }

        //-----( email format check )-----
        if( filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___EMAIL_INVALID;
            $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);
            return true;
        }

        //-----( email already used )-----
        $question01_registration_information_from_email = self::where('email', '=', $email)->first();
        if( empty($question01_registration_information_from_email) == false){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___EMAIL_ALREADY_USED;
            $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);
            return true;
        }


        // There were no invalid parameters.
        return false;
    }

    /**
     *
     */
    public static function store(&$encoded_return_contents, string $name, string $email) : bool
    {
        $return_contents = [];

        try{
            //----------( save )----------
            $token = str_random(10);
            $registration_information = new Question01RegistrationInformation();
            $registration_information->name             = $name;
            $registration_information->email            = $email;
            $registration_information->for_regist_token = $token;
            $registration_information->is_cleared       = self::IS_CLEARED___FALSE;
            $registration_information->save();


            //----------( create return contents )----------
            $message = sprintf(self::MESSAGE___CHALLENGE_USERS_POST___CLEAR_MESSAGE, url()->previous(), $token);
            $return_contents['message'] = $message;
            $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);


            return true;
         }
         catch(\Exception $e){
            \Log::emergency($e->getMessage());

            $return_contents['message'] = self::MESSAGE___SERVER_ERROR;
            $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);

            return false;
         }
    }
}


