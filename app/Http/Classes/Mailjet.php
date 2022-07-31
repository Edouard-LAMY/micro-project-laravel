<?php

namespace App\Http\Classes;

use Mailjet\Client;
use Mailjet\Resources;

class MailJet
{
    private $key_api;
    private $key_secret;

    public function __construct()
    {
        $this->key_api = env('MAILJET_APIKEY');
        $this->key_secret = env('MAILJET_APISECRET');
    }

    // mail de client via formulaire de contact
    public function sendContact($subjectMail, $confirmUser, $contentMail)
    {
        $mj = new Client($this->key_api, $this->key_secret, true, ['version' => 'v3.1']);

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "edouardlamy37@gmail.com",
                    ],
                    'To' => [
                        [
                            'Email' => "edouardlamy37@gmail.com",
                            'Name' => "Client"
                        ]
                    ],
                    'TemplateID' => 3458995,
                    'TemplateLanguage' => true,
                    'Subject' => $subjectMail,
                    'Variables' => [
                        'confirm' => $confirmUser,
                        'content' => $contentMail,
                    ]
                ]
            ]
        ];

        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}
