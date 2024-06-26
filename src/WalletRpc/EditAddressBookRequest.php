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
 * Edit an existing address book entry.Alias: *None*
 */
class EditAddressBookRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Index of the address book entry to edit.
     */
    #[Json]
    public int $index;

    /**
     * If true, set the address for this entry to the value of "address".
     */
    #[Json('set_address')]
    public bool $setAddress;

    /**
     * The 95-character public address to set.
     */
    #[Json(omit_empty: true)]
    public ?Address $address;

    /**
     * If true, set the description for this entry to the value of "description".
     */
    #[Json('set_description')]
    public bool $setDescription;

    /**
     * Human-readable description for this entry.
     */
    #[Json(omit_empty: true)]
    public ?string $description;

    public static function create(
        int $index,
        bool $setAddress,
        ?Address $address = null,
        bool $setDescription = false,
        ?string $description = null,
    ): RpcRequest {
        $self = new self();
        $self->index = $index;
        $self->setAddress = $setAddress;
        $self->address = $address;
        $self->setDescription = $setDescription;
        $self->description = $description;
        return new RpcRequest('edit_address_book', $self);
    }
}
