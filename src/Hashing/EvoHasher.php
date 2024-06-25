<?php

declare(strict_types=1);

namespace EvoManager\Hashing;

use EvolutionCMS\Legacy\PasswordHash;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Hashing\AbstractHasher;

class EvoHasher extends AbstractHasher implements Hasher
{
    /**
     * @param $value
     * @param array $options
     *
     * @return string
     */
    public function make($value, array $options = []): string
    {
        return (new PasswordHash())->HashPassword($value);
    }

    /**
     * @param $value
     * @param $hashedValue
     * @param array $options
     *
     * @return bool
     */
    public function check($value, $hashedValue, array $options = []): bool
    {
        return (new PasswordHash())->CheckPassword($value, $hashedValue);
    }

    /**
     * @param $hashedValue
     * @param array $options
     *
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = []): bool
    {
        return false;
    }
}
