<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NequiService
{
    protected $apiUrl;
    protected $clientId;
    protected $clientSecret;
    protected $phoneNumber;

    public function __construct()
    {
        $this->apiUrl = config('services.nequi.api_url');
        $this->clientId = config('services.nequi.client_id');
        $this->clientSecret = config('services.nequi.client_secret');
        $this->phoneNumber = config('services.nequi.phone_number');
    }

    public function generateToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("{$this->apiUrl}/oauth/token", [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        throw new \Exception('Failed to generate access token');
    }

    public function createPayment($amount, $reference)
    {
        $token = $this->generateToken();

        $response = Http::withToken($token)->post("{$this->apiUrl}/payments/v1.0/transactions", [
            'phoneNumber' => $this->phoneNumber,
            'amount' => $amount,
            'reference' => $reference,
            'currency' => 'COP',
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Failed to create payment');
    }
}
