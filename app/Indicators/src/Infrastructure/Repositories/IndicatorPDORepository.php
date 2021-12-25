<?php

declare(strict_types=1);

namespace App\Indicators\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use App\Indicators\Models\IndicatorNotFound;
use App\Indicators\Models\IndicatorReadStorage;
use Ramsey\Uuid\UuidInterface;

final class IndicatorPDORepository implements IndicatorReadStorage
{
    /**
     * @throws IndicatorNotFound
     */
    public function get(UuidInterface $id): string
    {
        /** @var \PDOStatement */
        $pdoStatement = DB::connection()->getPdo()->prepare('SELECT value FROM indicators WHERE id = :id');
        $pdoStatement->execute([':id' => $id]);

        $result = $pdoStatement->fetch(\PDO::FETCH_ASSOC);

        if ($result === false) {
            throw new IndicatorNotFound(sprintf('Indicator with ID: %s not found', $id));
        }

        return $result['value'];
    }
}
