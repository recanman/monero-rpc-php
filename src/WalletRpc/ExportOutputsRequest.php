<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Export outputs in hex format.
 */
class ExportOutputsRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * If true, export all outputs. Otherwise, export outputs since the last export. (
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $all;

    public static function create(?bool $all = null): RpcRequest
    {
        $self = new self();
        $self->all = $all;
        return new RpcRequest('export_outputs', $self);
    }
}
