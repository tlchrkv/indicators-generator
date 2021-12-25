<?php

declare(strict_types=1);

namespace App\Indicators\Presentation\Api\v1\Get;

use Illuminate\Http\JsonResponse;
use App\Indicators\Models\IndicatorNotFound;
use App\Indicators\Models\IndicatorReadStorage;
use Symfony\Component\HttpFoundation\Response;
use function response;

final class Controller extends \Illuminate\Routing\Controller
{
    public function __construct(private readonly IndicatorReadStorage $storage) {}

    public function exec(Request $request): JsonResponse
    {
        try {
            return response()->json(['value' => $this->storage->get($request->getId())]);
        } catch (IndicatorNotFound $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
