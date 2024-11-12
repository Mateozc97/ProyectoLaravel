<?php

namespace App\Services;

use GuzzleHttp\Client;

class ChatGPTService
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/',
        ]);
    }

    public function askQuestionWithContext($context, $question)
    {
        // Contexto específico para SQL Server
        $context .= " Estoy utilizando una base de datos en Microsoft SQL Server. 
        Las consultas deben usar TOP en lugar de LIMIT y seguir la sintaxis de SQL Server (T-SQL).";
    
        $response = $this->client->post('v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => $context],
                    ['role' => 'user', 'content' => $question],
                ],
                'max_tokens' => 300,
                'temperature' => 0.7,
            ],
        ]);
    
        $responseBody = json_decode($response->getBody(), true);
        $message = $responseBody['choices'][0]['message']['content'] ?? '';
    
        return $message;
    }
    
}