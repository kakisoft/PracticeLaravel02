<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Question01RegistrationInformation;

class Question01RegistrationInformationTest extends TestCase
{
    /**
     *
     */
    public function test_callMeGetTest()
    {
        $return_contents = Question01RegistrationInformation::callMeGet();
        $encoded_return_contents = json_decode($return_contents, true);

        $this->assertEquals($encoded_return_contents['message'], Question01RegistrationInformation::MESSAGE___CALL_ME_GET);
    }
}
