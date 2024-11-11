<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatGPTService;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Inscripcion;

class QaController extends Controller
{
    protected $chatGPT;

    public function __construct(ChatGPTService $chatGPT)
    {
        $this->chatGPT = $chatGPT;
    }

    public function askQuestion(Request $request)
{
    $request->validate([
        'question' => 'required|string',
    ]);

    $question = $request->input('question');

    try {
        // Enviar la pregunta a ChatGPT y obtener la respuesta preliminar
        $answer = $this->chatGPT->askQuestion($question);

        // Depurar la respuesta para verificar si se está recibiendo algo
        if (empty($answer)) {
            $answer = "No se pudo obtener una respuesta de la API. Por favor, inténtelo de nuevo más tarde.";
        }
    } catch (\Exception $e) {
        // Captura cualquier error y muestra un mensaje apropiado
        $answer = "Ocurrió un error: " . $e->getMessage();
    }

    // Mostrar la respuesta en la vista
    return view('qa.index', compact('question', 'answer'));
}

    public function index()
    {
        return view('qa.index');
}

}
