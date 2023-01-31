<?php

namespace App\Http\Controllers;

use App\Services\GeneratorOpenAIService;
use Illuminate\Support\Facades\Request;


class OpenAIController extends Controller
{
    private $openAiService;

    public function __construct(GeneratorOpenAIService $openaiService)
    {
        $this->openAiService= $openaiService;
    }

    public function chatOpenAi(Request $request)
    {
        $question = $request->question;

        if ($question == null) {
            return back();
        }

        $response= $this->openAiService->generateResponseOpenAi($question);

        return response()->json(['response' => $response]);
    }
}