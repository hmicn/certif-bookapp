<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTimeImmutable;

class MongoDBService {

    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient) {
        $this->httpClient = $httpClient;
    }

    public function insertVisit(string $pageName) {
        $this->httpClient->request('POST', 'https://us-east-2.aws.neurelo.com/rest/visits/__one', [
            'headers' => [
                'X-API-KEY' => 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6ImFybjphd3M6a21zOnVzLWVhc3QtMjowMzczODQxMTc5ODQ6YWxpYXMvYjJjYWNlYWItQXV0aC1LZXkifQ.eyJlbnZpcm9ubWVudF9pZCI6IjA1ZGUwYjk1LTMzMjctNDY3Zi1iODk4LTczYjQxOTc0YWZmZSIsImdhdGV3YXlfaWQiOiJnd19iMmNhY2VhYi0yYTRlLTQ3YzYtOTlkZS1iNDM3M2I4NWE2MjIiLCJwb2xpY2llcyI6WyJSRUFEIiwiV1JJVEUiLCJVUERBVEUiLCJERUxFVEUiLCJDVVNUT00iXSwiaWF0IjoiMjAyNS0wMi0xN1QwMDoxODowMy41ODQ0MTkzNDVaIiwianRpIjoiZDEyYTE2N2QtYWIyMC00OTNkLWJhNmItODIyMGQyZGRlYzdhIn0.ADOz9yd7GeZJSkWOKUNMv7L5QGujmO-pS20vSE6NYPv2K1GIt_EYBHxv4tLj_WUTTAv-zGxCXIkTbQSRuKcczmMnirJGDsGAACVq0Ses-hABjHzV7icFXiNAxI9o30Zk0sR8wEd5kM0HrPxagj4H4CncE00PuWUpn4PjIx-6kWZ-ovtp553fb6TUdTKRX30rXtrH5FpZEMEOBqQv-tMVhSktlFtNg5vv7nqUe_qXUhBiBpZPQXOI_oTYT0l50pmT4AeE4K8KMBwPi-iUjJzJdFqfY2ylluHefftXb1RRE2uQPhyTtK7Dpyxny66YTcxqEptdaaSNPPn9RScHtdmMjA',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'pageName' => $pageName,
                'visitedAt' => (new DateTimeImmutable())->format('Y-m-d H:i:s'),
            ],
        ]);
    }

}