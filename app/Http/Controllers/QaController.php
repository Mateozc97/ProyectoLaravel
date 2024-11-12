<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\ChatGPTService;

class QaController extends Controller
{
    protected $chatGPTService;

    public function __construct(ChatGPTService $chatGPTService)
    {
        $this->chatGPTService = $chatGPTService;
    }

    public function index()
    {
        return view('qa.index'); // Muestra la vista inicial sin respuesta
    }

    public function askQuestion(Request $request)
    {
        $question = $request->input('question');
        $answer = '';

        try {
            // Contexto detallado de las tablas
            $dbContext = "La base de datos contiene las siguientes tablas y columnas:
            1. Tabla: estudiantes
               - id_estudiante (int, clave primaria)
               - nombre (nvarchar(100))
               - correo (nvarchar(100))
               - telefono (nvarchar(20))
               - created_at (datetime)
               - updated_at (datetime)
            2. Tabla: inscripciones
               - id_inscripcion (int, clave primaria)
               - id_estudiante (int, clave foránea de estudiantes)
               - cod_materia (nvarchar(255), clave foránea de Materia)
               - fecha_inscripcion (datetime)
               - created_at (datetime)
               - updated_at (datetime)
            3. Tabla: Materia
               - id (int, clave primaria)
               - email_profesor (nvarchar(255))
               - password (nvarchar(255))
               - cod_materia (nvarchar(255))
               - nombre_materia (nvarchar(255))
               - created_at (datetime)
               - updated_at (datetime)";

            // Obtener la consulta SQL desde ChatGPT
            $response = $this->chatGPTService->askQuestionWithContext($dbContext, $question);

            // Ejecutar la consulta SQL y procesar los resultados
            $queryResult = $this->executeDatabaseQuery($response);

            $answer = $queryResult ?: "No se encontró información relevante para la pregunta.";
        } catch (\Exception $e) {
            $answer = "Error al procesar la pregunta: " . $e->getMessage();
        }

        return view('qa.index', compact('answer'));
    }

    protected function executeDatabaseQuery($response)
    {
        // Validar si la respuesta es una cadena
        if (!is_string($response)) {
            return "Error: La respuesta no es una cadena válida. Respuesta recibida: " . json_encode($response);
        }

        // Extraer la consulta SQL del bloque de respuesta
        if (preg_match('/SELECT .*?;/is', $response, $matches)) {
            $query = trim($matches[0]); // Extraer solo la consulta SQL
        } else {
            return "Error: No se encontró una consulta SQL válida. Respuesta recibida: $response";
        }

        try {
            // Ejecutar la consulta directamente
            $result = DB::select($query);

            // Verificar si hay resultados
            if (count($result) > 0) {
                return json_encode($result, JSON_PRETTY_PRINT);
            } else {
                return "No se encontraron resultados para la consulta.";
            }
        } catch (\PDOException $e) {
            return "Error al ejecutar la consulta (PDO): " . $e->getMessage();
        } catch (\Exception $e) {
            return "Error al ejecutar la consulta: " . $e->getMessage();
        }
    }
}