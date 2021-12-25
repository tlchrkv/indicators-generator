<?php

declare(strict_types=1);

namespace App\Indicators\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use App\Indicators\Models\StringGenerator\StringGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @property-read UuidInterface $id
 * @property-read Type $type
 * @property-read string $value
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Indicator extends Model
{
    protected $table = 'indicators';
    protected $casts = ['type' => Type::class];
    protected $fillable = ['id', 'type', 'value'];
    protected $guarded = ['id', 'type', 'value'];

    public static function generate(UuidInterface $id, Type $type): void
    {
        $value = match ($type) {
            Type::number => rand(0, 999999999),
            Type::letters => StringGenerator::letters(),
            Type::numbersAndLetters => StringGenerator::lettersAndNumbers(),
            Type::guid => Uuid::uuid4(),
        };

        $indicator = new self([
            'id' => $id,
            'type' => $type,
            'value' => $value,
        ]);

        $indicator->save();
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
