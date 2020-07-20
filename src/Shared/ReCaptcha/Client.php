<?php
declare(strict_types=1);

namespace Shared\ReCaptcha;

use RuntimeException;
use Shared\Http\ParameterValue;

class Client
{
    /**
     * @var ApiKey
     */
    private $apiKey;

    public function __construct(ApiKey $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function wasChallengeSuccessful(ParameterValue $value): bool
    {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 2,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => [
                    'secret' => $this->apiKey->getValue(),
                    'response' => $value->getValue()
                ],
            ]
        );

        $response = curl_exec($curl);
        curl_close($curl);

        if ($response === false) {
            throw new RuntimeException('Verifying customer\'s reCaptcha challenge failed.');
        }

        $jsonResponseAsArray = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        return $jsonResponseAsArray['success'] === true;
    }
}
