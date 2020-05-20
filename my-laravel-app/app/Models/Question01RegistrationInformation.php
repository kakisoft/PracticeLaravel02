<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property string   $name
 * @property string   $email
 * @property string   $password
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
    const MESSAGE___404_ERROR = "No No. Not this way";

    const MESSAGE___CALL_ME_GET         = "Almost! It's not GET. Keep trying.";
    const MESSAGE___CALL_ME_POST        = "Great! Please register as /challenge_users";
    const MESSAGE___CHALLENGE_USERS_GET = "GET? No. No.";

    const MESSAGE___CHALLENGE_USERS_POST___NAME_BLANK         = "Validation Error, [:name, \"can't be blank\"]";
    const MESSAGE___CHALLENGE_USERS_POST___NAME_ALREADY_USED  = "name already taken";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_BLANK        = "Validation Error, [:email, \"can't be blank\"]";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_ALREADY_USED = "email already taken";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_INVALID      = "Validation Error, [:email, \"is invalid\"]";

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
        $return_contents = [];

        //-----( name is blank )-----
        if( is_null($name) ){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___NAME_BLANK;
            return json_encode($return_contents, JSON_UNESCAPED_SLASHES);
        }

        //-----( name already used )-----



        //-----( email is blank )-----
        if( is_null($email) ){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___EMAIL_BLANK;
            return json_encode($return_contents, JSON_UNESCAPED_SLASHES);
        }

        //-----( email format check )-----
        if( filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_POST___EMAIL_INVALID;
            return json_encode($return_contents, JSON_UNESCAPED_SLASHES);
        }


        //-----( email already used )-----


        // {"message":"Thanks! Please access to http://challenge-your-limits.herokuapp.com/challenge_users/token/M-ED_X9MVEQ  from your web browser."}



        $return_contents['message'] = "OK!";
        $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);

        return $encoded_return_contents;
    }
}


