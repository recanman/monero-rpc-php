<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Edit an existing address book entry.Alias: *None*
 */
class EditAddressBookRequest implements ParameterInterface
{
    use JsonSerialize;

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
     * (Optional) The 95-character public address to set.
     */
    #[Json(omit_empty: true)]
    public ?string $address;

    /**
     * If true, set the description for this entry to the value of "description".
     */
    #[Json('set_description')]
    public bool $setDescription;

    /**
     * (Optional) Human-readable description for this entry.
     */
    #[Json(omit_empty: true)]
    public ?string $description;

    /**
     * If true, set the payment ID for this entry to the value of "payment_id".
     */
    #[Json('set_payment_id')]
    public bool $setPaymentId;

    /**
     * (Optional, defaults to a random ID) 16 characters hex encoded.
     */
    #[Json('payment_id', omit_empty: true)]
    public ?string $paymentId;


    public static function create(
        int $index,
        bool $setAddress,
        ?string $address = null,
        bool $setDescription = false,
        ?string $description = null,
        bool $setPaymentId = false,
        ?string $paymentId = null,
    ): RpcRequest
    {
        $self = new self();
        $self->index = $index;
        $self->setAddress = $setAddress;
        $self->address = $address;
        $self->setDescription = $setDescription;
        $self->description = $description;
        $self->setPaymentId = $setPaymentId;
        $self->paymentId = $paymentId;
        return new RpcRequest('edit_address_book', $self);
    }
}
