<?php

declare(strict_types=1);

namespace App\Indicators\Presentation\Api\v1\Get;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Request extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    public function getId(): UuidInterface
    {
        return Uuid::fromString($this->route('id'));
    }
}
