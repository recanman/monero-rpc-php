<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Limit number of Outgoing peers.
 */
class OutPeersResponse
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * Max number of outgoing peers
     */
    #[Json('out_peers')]
    public int $outPeers;
}
