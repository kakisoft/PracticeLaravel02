<?php

namespace App\Services;

use App\User;

class CallMeAPI01
{
    const MESSAGE___CALL_ME_GET         = "Almost! It's not GET. Keep trying.";
    const MESSAGE___CALL_ME_POST        = "Great! Please register as /challenge_users";
    const MESSAGE___CHALLENGE_USERS_GET = "GET? No. No.";

    const MESSAGE___CHALLENGE_USERS_POST___NAME_BLANK         = "Validation Error, [:name, \"can't be blank\"]";
    const MESSAGE___CHALLENGE_USERS_POST___NAME_ALREADY_USED  = "name already used";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_BLANK        = "Validation Error, [:email, \"can't be blank\"]";
    const MESSAGE___CHALLENGE_USERS_POST___EMAIL_ALREADY_USED = "email already used";
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
    public static function challenge_usersPost($name, $email): string
    {
        $return_contents = [];
        $return_contents['message'] = self::MESSAGE___CHALLENGE_USERS_GET;
        $encoded_return_contents = json_encode($return_contents, JSON_UNESCAPED_SLASHES);

        return $encoded_return_contents;
    }

}
