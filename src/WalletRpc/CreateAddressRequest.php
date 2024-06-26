<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Create a new address for an account. Optionally, label the new address.
 */
class CreateAddressRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Create a new address for this account.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Label for the new address.
     */
    #[Json(omit_empty: true)]
    public ?string $label;

    /**
     * Number of addresses to create (.
     * When omitted the default value is 1
     */
    #[Json(omit_empty: true)]
    public ?int $count;

    public static function create(int $accountIndex, ?string $label = null, ?int $count = 1): RpcRequest
    {
        $self = new self();
        $self->accountIndex = $accountIndex;
        $self->label = $label;
        $self->count = $count;
        return new RpcRequest('create_address', $self);
    }
}
