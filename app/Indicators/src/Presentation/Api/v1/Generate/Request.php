<?php

declare(strict_types=1);

namespace App\Indicators\Presentation\Api\v1\Generate;

use Illuminate\Foundation\Http\FormRequest;
use App\Indicators\Models\Type;

final class Request extends FormRequest
{
    public function rules(): array
    {
        $typeCases = array_map(fn (Type $type): string => $type->value, Type::cases());

        return ['type' => 'required|string|in:' . implode(',', $typeCases)];
    }

    public function getType(): Type
    {
        return Type::from($this->request->get('type'));
    }
}
