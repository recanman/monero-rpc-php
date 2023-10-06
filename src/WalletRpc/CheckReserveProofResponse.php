<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Proves a wallet has a disposable reserve using a signature.
 */
class CheckReserveProofResponse
{
    use JsonSerializeBigInt;

    /**
     * States if the inputs proves the reserve.
     */
    #[Json]
    public bool $good;

    /**
     * Amount (in piconero) of the total that has been spent.
     */
    #[Json]
    public int $spent;

    /**
     * Total amount (in piconero) of the reserve that was proven.
     */
    #[Json]
    public int $total;
}
