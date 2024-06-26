<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Similar to [get_block_header_by_height](#get_block_header_by_height) above, but for a range of blocks. This method includes a starting block height and an ending block height as parameters to retrieve basic information about the range of blocks.
 */
class GetBlockHeadersRangeRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The starting block's height.
     */
    #[Json('start_height')]
    public int $startHeight;

    /**
     * The ending block's height.
     */
    #[Json('end_height')]
    public int $endHeight;

    /**
     * Add PoW hash to block_header response.
     * When omitted the default value is false
     */
    #[Json('fill_pow_hash', omit_empty: true)]
    public ?bool $fillPowHash;

    public static function create(int $startHeight, int $endHeight, ?bool $fillPowHash = null): RpcRequest
    {
        $self = new self();
        $self->startHeight = $startHeight;
        $self->endHeight = $endHeight;
        $self->fillPowHash = $fillPowHash;
        return new RpcRequest('get_block_headers_range', $self);
    }
}
