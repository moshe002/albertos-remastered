<?php

namespace App\Services;

use App\Models\ActivationToken;
use InvalidArgumentException;

class TokenService
{
    protected $activationToken;

    public function __construct(ActivationToken $activationToken)
    {
        $this->activationToken = $activationToken;
    }

    public function verify(array $data)
    {
        if (! array_key_exists('type', $data)) {
            throw new InvalidArgumentException('Missing required field type.');
        }

        if (! array_key_exists('token', $data)) {
            throw new InvalidArgumentException('Missing required field token.');
        }

        if (! in_array($data['type'], ['activation', 'password_reset'])) {
            throw new InvalidArgumentException('Invalid type, value must be either activation or reset.');
        }

        $models = [
            'activation' => $this->activationToken,
        ];

        return $models[$data['type']]->where('token', $data['token'])
            ->firstOrFail();
    }
}
