<?php

declare(strict_types=1);

namespace App\Indicators\Presentation\Api\v1\Generate;

use Illuminate\Http\JsonResponse;
use App\Indicators\Models\Indicator;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use function response;

final class Controller extends \Illuminate\Routing\Controller
{
    public function exec(Request $request): JsonResponse
    {
        $id = Uuid::uuid4();

        Indicator::generate($id, $request->getType());

        return response()->json(['id' => $id], Response::HTTP_CREATED);
    }
}
