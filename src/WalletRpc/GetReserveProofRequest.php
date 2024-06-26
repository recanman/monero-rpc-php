<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Generate a signature to prove of an available amount in a wallet.
 */
class GetReserveProofRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Proves all wallet balance to be disposable.
     */
    #[Json]
    public bool $all;

    /**
     * Specify the account from which to prove reserve. (ignored if `all` is set to true)
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Amount (in piconero) to prove the account has in reserve. (ignored if `all` is set to true)
     */
    #[Json]
    public Amount $amount;

    /**
     * (Optional) add a message to the signature to further authenticate the proving process. If a _message_ is added to `get_reserve_proof` (optional), this message will be required when using `check_reserve_proof`
     */
    #[Json(omit_empty: true)]
    public ?string $message;

    public static function create(bool $all, int $accountIndex, Amount $amount, ?string $message = null): RpcRequest
    {
        $self = new self();
        $self->all = $all;
        $self->accountIndex = $accountIndex;
        $self->amount = $amount;
        $self->message = $message;
        return new RpcRequest('get_reserve_proof', $self);
    }
}
