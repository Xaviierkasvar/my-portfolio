<?php

namespace App\Mail;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MailerSendService
{
    protected $client;
    protected $apiKey;
    protected $fromEmail;
    protected $fromName;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('MAILERSEND_API_KEY');
        $this->fromEmail = env('MAILERSEND_FROM_EMAIL');
        $this->fromName = env('MAILERSEND_FROM_NAME', '');
    }

    /**
     * Enviar un correo con MailerSend.
     *
     * @param array $data
     * @return bool
     */
    public function sendEmail(array $data): bool
    {
        try {
            $payload = [
                'from' => [
                    'email' => $this->fromName .'@'. $this->fromEmail,
                ],
                'to' => [
                    ['email' => $data['to_email']],
                ],
                'subject' => $data['subject'],
                'text' => $data['body'],
                'html' => '<p>' . nl2br($data['body']) . '</p>',
            ];

            if (isset($data['cc_email'])) {
                $payload['cc'] = [
                    ['email' => $data['cc_email']],
                ];
            }

            $response = $this->client->post('https://api.mailersend.com/v1/email', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                ],
                'json' => $payload,
            ]);

            if ($response->getStatusCode() === 202) {
                Log::info('Correo enviado exitosamente a: ' . $data['to_email']);
                return true;
            }

            Log::warning('Fallo al enviar el correo: ' . $response->getBody());
            return false;
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return false;
        }
    }
}
