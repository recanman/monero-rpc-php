<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set whether and how often to automatically refresh the current wallet.
 */
class AutoRefreshRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Enable or disable automatic refreshing (.
     * When omitted the default value is true
     */
    #[Json(omit_empty: true)]
    public ?bool $enable;

    /**
     * The period of the wallet refresh cycle (i.e. time between refreshes) in seconds.
     */
    #[Json(omit_empty: true)]
    public ?int $period;

    public static function create(?bool $enable = null, ?int $period = null): RpcRequest
    {
        $self = new self();
        $self->enable = $enable;
        $self->period = $period;
        return new RpcRequest('auto_refresh', $self);
    }
}
