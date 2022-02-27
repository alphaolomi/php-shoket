<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

it('can test', function () {
    expect(true)->toBeTrue();
});


it('can instantiate without Guzzle/Http Client', function () {
    $s = new \Shoket\SDK\Shoket(['apiSecret' => '123456789',]);

    expect($s)->toBeInstanceOf(\Shoket\SDK\Shoket::class);
});

it('can change Api secret', function () {
    $s = new \Shoket\SDK\Shoket(['apiSecret' => '123456789',]);
    $apiSecret = '987654321';
    $s->setApiKey($apiSecret);

    expect($s)->toBeInstanceOf(\Shoket\SDK\Shoket::class);
    expect($s->getApiKey())->toBe($apiSecret);
});

it('throws InvalidArgumentException if API keys  is missing', function () {
    new \Shoket\SDK\Shoket();
})->throws(InvalidArgumentException::class);

it('can instantiate with Custom Guzzle/Http Client', function () {
    $mock = new MockHandler([new Response(200, ['X-Foo' => 'Bar'], 'Hello World')]);
    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $s = new \Shoket\SDK\Shoket([
        'apiSecret' => '123456789',
    ], $client);

    expect($s)->toBeInstanceOf(\Shoket\SDK\Shoket::class);
});


it('can make payment request', function () {
    $mock = new MockHandler([new Response(200, ['X-Foo' => 'Bar'], '{
        "Status": "success",
        "customer": {
          "customer_name": "376FcD3gbidW",
          "email": "user@user.com",
          "id": 64043
        },
        "data": {
          "amount": 64000,
          "channel": "Halotel",
          "currency": "TSH",
          "number_used": "0663803078",
          "status": "Success",
          "transaction_date": "2021-06-27 15:08:59.917691"
        },
        "message": "Transaction is completed",
        "reference": "adz49dS428b7kbDTdG4MN"
      }')]);
    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $s = new \Shoket\SDK\Shoket([
        'apiSecret' => '123456789',
    ], $client);

    $res = $s->makePaymentRequest([
        "amount" => "5000",
        "customer_name" => "John Doe",
        "email" => "john@user.com",
        "number_used" => "255612345678",
        "channel" => "Tigo",
    ]);
    expect($res)->toBeArray();
});


it('can make verify payment requests', function () {
    $mock = new MockHandler([new Response(200, ['X-Foo' => 'Bar'], '{
        "Status": "Ok",
        "customer": {
          "email": "user@user.com",
          "customer_name": "John",
          "id": 64043
        },
        "data": {
          "amount": 64000,
          "channel": "Halotel",
          "currency": "TSH",
          "number_used": "0663803078",
          "status": "Success",
          "transaction_date": "2021-06-27 15:08:59.917691"
        },
        "message": "Transaction is completed",
        "reference": "adz49dS428b7kbDTdG4MN"
      }
      ')]);
    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $s = new \Shoket\SDK\Shoket([
        'apiSecret' => '123456789',
    ], $client);

    $res = $s->verifyPaymentRequest('OB3J177Lqnp6Rg6wHqr3q', [
        "provider_name" => "Vodacom",
        "provider_code" => "MPESA",
    ]);
    expect($res)->toBeArray();
});
