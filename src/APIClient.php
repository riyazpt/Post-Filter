<?php

namespace API;

class APIClient
{
    private string $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function fetchData(string $endpoint): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36"); // Set User-Agent

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Error fetching data from $endpoint: " . curl_error($ch) . "\n";
            curl_close($ch);
            return [];
        }

        curl_close($ch);
      
        $decodedResponse = json_decode($response, true);

        if (!is_array($decodedResponse)) {
            echo "Error decoding JSON response from $endpoint\n";
            return [];
        }

        return $decodedResponse;
    }

}
