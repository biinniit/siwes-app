<?php

namespace App\Helpers;

use Illuminate\Contracts\Hashing\Hasher;

class Sha256Hasher implements Hasher
{
    public function info($hashedValue)
    {
        return password_get_info($hashedValue);
    }

    public function make($value, array $options = []): string
    {
        $hash = hex2bin(hash('sha256', $value));
        return $hash;
    }

    public function check($value, $hashedValue, array $options = []): bool
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
        return $hashedValue === hex2bin(hash('sha256', $value));
    }
  
    public function needsRehash($hashedValue, array $options = []): bool
    {
        return false;
    }
}
