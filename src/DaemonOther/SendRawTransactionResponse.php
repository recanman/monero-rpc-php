<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\DaemonRpc\DaemonRpcAccessResponseFields;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Broadcast a raw transaction to the network.
 */
class SendRawTransactionResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * Transaction is a double spend (`true`) or not (`false`).
     */
    #[Json('double_spend')]
    public bool $doubleSpend;

    /**
     * Fee is too low (`true`) or OK (`false`).
     */
    #[Json('fee_too_low')]
    public bool $feeTooLow;

    /**
     * Input is invalid (`true`) or valid (`false`).
     */
    #[Json('invalid_input')]
    public bool $invalidInput;

    /**
     * Output is invalid (`true`) or valid (`false`).
     */
    #[Json('invalid_output')]
    public bool $invalidOutput;

    /**
     * Mixin count is too low (`true`) or OK (`false`).
     */
    #[Json('low_mixin')]
    public bool $lowMixin;

    /**
     * Transaction is a standard ring transaction (`true`) or a ring confidential transaction (`false`).
     */
    #[Json('not_rct')]
    public bool $notRct;

    /**
     * Transaction was not relayed (`true`) or relayed (`false`).
     */
    #[Json('not_relayed')]
    public bool $notRelayed;

    /**
     * Transaction uses more money than available (`true`) or not (`false`).
     */
    #[Json]
    public bool $overspend;

    /**
     * Additional information. Currently empty or "Not relayed" if transaction was accepted but not relayed.
     */
    #[Json]
    public string $reason;

    /**
     * Sanity check
     */
    #[Json('sanity_check_failed')]
    public bool $sanityCheckFailed;

    /**
     * Transaction size is too big (`true`) or OK (`false`).
     */
    #[Json('too_big')]
    public bool $tooBig;

    /**
     * Too few outputs
     */
    #[Json('too_few_outputs')]
    public bool $tooFewOutputs;

    /**
     * Tx extra is too big
     */
    #[Json('tx_extra_too_big')]
    public bool $txExtraTooBig;
}
