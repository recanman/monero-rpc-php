<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Gives an estimation on fees per byte.
 */
class GetFeeEstimateResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * Amount of fees estimated per byte in piconero
     */
    #[Json]
    public Amount $fee;

    /**
     * @var int[] Represents the base fees at different priorities [slow, normal, fast, fastest].
     */
    #[Json]
    public array $fees = [];

    /**
     * Final fee should be rounded up to an even multiple of this value
     */
    #[Json('quantization_mask')]
    public int $quantizationMask;
}
