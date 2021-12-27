<?php

declare(strict_types=1);

namespace App\Indicators\Tests;

use App\Indicators\Models\Indicator;
use App\Indicators\Models\IndicatorReadStorage;
use App\Indicators\Models\Type;
use App\Kernel\Tests\TestCase;
use Ramsey\Uuid\Uuid;

final class IndicatorGenerationTest extends TestCase
{
    /**
     * @TODO check generated value for all App\Indicators\Models\Type cases
     */
    public function test(): void
    {
        $value = $this->callTestingFunctionality(Type::number);
        $this->assertTrue(is_numeric($value));
    }

    private function callTestingFunctionality(Type $type): string
    {
        $app = $this->createApplication();

        $indicatorId = Uuid::uuid4();
        Indicator::generate($indicatorId, $type);

        /** @var IndicatorReadStorage $indicatorStorage */
        $indicatorStorage = $app->get(IndicatorReadStorage::class);
        $value = $indicatorStorage->get($indicatorId);

        Indicator::query()->find($indicatorId)->delete();

        return $value;
    }
}
