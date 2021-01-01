<?php

namespace Shoket\SDK;

use GuzzleHttp\Client;

/**
 * Shoket SDK
 * @package Shoket\SDK
 * @example
 * ```php
 * $shoket = new Shoket(['apiSecret' => 'your-api-key']);
 * ```
 */
class Shoket
{
    /** @var \GuzzleHttp\Client Client */
    private Client $client;

    /** @var string apiVersion */
    private string $apiVersion = 'v1';

    /** @var string apiSecret */
    private string $apiKey;

    public function __construct(array $options = [], Client $client = null)
    {
        if (array_key_exists('apiSecret', $options)) {
            $this->apiKey = $options['apiSecret'];
        } else {
            throw new \InvalidArgumentException('API Secret is required, To obtain visit https://developers.shoket.co/');
        }

        $this->client = $client instanceof Client ? $client : new Client([
            'base_uri' => 'https://api.shoket.co/' . $this->apiVersion . '/',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Make payment request
     * @param array $data
     * @return mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @example
     * ```php
     * //...
     * $shoket->makePayment([
     *  "amount" => "5000",
     *  "customer_name" => "John Doe",
     *  "email" =>  "john@user.com",
     *  "number_used" => "255612345678",
     *  "channel" =>  "Tigo"
     * ]);
     * ```
     *
     */
    public function makePaymentRequest(array $data): mixed
    {
        $response = $this->client->request('POST', 'charge/', ['json' => $data]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Verify Payment request.
     *
     * @param string $reference
     * @param array $data
     * @return mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @example
     * ```php
     * $shoketClient->verifyPaymentRequest('123456789',[
     *  "provider_name"=> "Vodacom",
     *  "provider_code"=> "MPESA"
     * ]);
     * ```
     *
     */
    public function verifyPaymentRequest(string $reference, array $data): mixed
    {
        $response = $this->client->request('GET', 'verify/' . $reference, ['json' => $data]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }
}
