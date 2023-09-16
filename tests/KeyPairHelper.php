<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests;

use MoneroIntegrations\MoneroPhp\Cryptonote;

class KeyPairHelper
{
    private Cryptonote $cryptoNote;

    private string $privateViewKey;
    private string $publicSpendKey;
    private string $publicViewKey;

    public function __construct(private string $privateSpendKey)
    {
        ini_set('xdebug.max_nesting_level', 10000);
        $this->cryptoNote = new Cryptonote();
    }

    public function getPrivateSpendKey(): string
    {
        return $this->privateSpendKey;
    }

    public function getPrivateViewKey(): string
    {
        if (empty($this->privateViewKey)) {
            $this->privateViewKey = $this->cryptoNote->derive_viewKey($this->privateSpendKey);
        }

        return $this->privateViewKey;
    }

    public function getPublicSpendKey(): string
    {
        if (empty($this->publicSpendKey)) {
            $this->publicSpendKey = $this->cryptoNote->pk_from_sk($this->privateSpendKey);
        }

        return $this->publicSpendKey;
    }

    public function getPublicViewKey(): string
    {
        if (empty($this->publicViewKey)) {
            $this->publicViewKey = $this->cryptoNote->pk_from_sk($this->getPrivateViewKey());
        }

        return $this->publicViewKey;
    }

    public function getAddress(): string
    {
        return $this->cryptoNote->encode_address($this->getPublicSpendKey(), $this->getPublicViewKey());
    }

    public function getTestnetAddress(): string
    {
        return $this->cryptoNote->encode_address($this->getPublicSpendKey(), $this->getPublicViewKey(), 35);
    }
}
