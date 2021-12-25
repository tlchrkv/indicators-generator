<?php

declare(strict_types=1);

namespace App\Indicators\Models;

use Ramsey\Uuid\UuidInterface;

interface IndicatorReadStorage
{
    /**
     * @throws IndicatorNotFound
     */
    public function get(UuidInterface $id): string;
}
