<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonRpcAccessResponseFields;
use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Model\OutputKey;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get outputs.
 */
class GetOutsResponse
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /** @var OutputKey[] */
    #[Json(type: OutputKey::class)]
    public array $outs;
}
