<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Monero\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class InputKey implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public Amount $amount;

    /**
     * @var int[]
     */
    #[Json('key_offsets')]
    public array $keyOffsets = [];

    #[Json('k_image')]
    public string $keyImage;
}
