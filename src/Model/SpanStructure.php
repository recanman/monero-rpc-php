<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

class SpanStructure
{
    use JsonSerializeBigInt;

    public function __construct()
    {
    }
}
