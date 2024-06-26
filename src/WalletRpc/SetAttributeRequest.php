<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set arbitrary attribute.
 */
class SetAttributeRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * attribute name
     */
    #[Json]
    public string $key;

    /**
     * attribute value
     */
    #[Json]
    public string $value;

    public static function create(string $key, string $value): RpcRequest
    {
        $self = new self();
        $self->key = $key;
        $self->value = $value;
        return new RpcRequest('set_attribute', $self);
    }
}
