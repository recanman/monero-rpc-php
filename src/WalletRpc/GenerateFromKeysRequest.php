<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Restores a wallet from a given wallet address, view key, and optional spend key.
 */
class GenerateFromKeysRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The block height to restore the wallet from.
     * When omitted the default value is 0
     */
    #[Json('restore_height', omit_empty: true)]
    public ?int $restoreHeight;

    /**
     * The wallet's file name on the RPC server.
     */
    #[Json]
    public string $filename;

    /**
     * The wallet's primary address.
     */
    #[Json]
    public Address $address;

    /**
     * omit to create a view-only wallet) The wallet's private spend key.
     */
    #[Json(omit_empty: true)]
    public ?string $spendkey;

    /**
     * The wallet's private view key.
     */
    #[Json]
    public string $viewkey;

    /**
     * The wallet's password.
     */
    #[Json]
    public string $password;

    /**
     * (Defaults to true) If true, save the current wallet before generating the new wallet.
     */
    #[Json('autosave_current', omit_empty: true)]
    public ?bool $autosaveCurrent;

    public static function create(
        string $filename,
        Address $address,
        string $viewkey,
        string $password,
        ?int $restoreHeight = null,
        ?string $spendkey = null,
        ?bool $autosaveCurrent = true,
    ): RpcRequest {
        $self = new self();
        $self->restoreHeight = $restoreHeight;
        $self->filename = $filename;
        $self->address = $address;
        $self->spendkey = $spendkey;
        $self->viewkey = $viewkey;
        $self->password = $password;
        $self->autosaveCurrent = $autosaveCurrent;
        return new RpcRequest('generate_from_keys', $self);
    }
}
