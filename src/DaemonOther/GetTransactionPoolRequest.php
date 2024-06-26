<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\EmptyOtherRpcRequest;

/**
 * Show information about valid transactions seen by the node but not yet mined into a block, as well as spent key image information for the txpool in the node's memory.
 */
class GetTransactionPoolRequest extends OtherRpcRequest
{
    use EmptyOtherRpcRequest;
}
