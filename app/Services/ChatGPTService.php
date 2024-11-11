<?php

namespace App\Services;

use GuzzleHttp\Client;

class ChatGPTService
{
    protected $apiKey;
    protected $client;
    
    public function __construct()
    {
        // Carga la clave API desde el archivo .env
        $this->apiKey = env('OPENAI_API_KEY');

        // Configura el cliente HTTP
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/',
        ]);
    }

    public function askQuestion($question)
    {
        try {
            // Realiza la solicitud POST a la API de OpenAI
            $response = $this->client->post('v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo', // Cambia según el modelo que desees usar
                    'messages' => [
                        ['role' => 'user', 'content' => $question],
                    ],
                    'max_tokens' => 150,
                    'temperature' => 0.7,
                ],
            ]);
        
            // Procesa la respuesta
            $responseBody = json_decode($response->getBody(), true);
            return $responseBody['choices'][0]['message']['content'] ?? 'No se pudo obtener respuesta.';
        } catch (\Exception $e) {
            // Manejo de errores
            return 'Error al comunicarse con la API: ' . $e->getMessage();
        }
    }
}