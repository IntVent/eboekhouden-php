<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenBalance implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected int $id = 0;
    protected string $code = '';
    protected string $category = '';
    protected float $balance;

    /**
     * EboekhoudenBalance constructor.
     * @param array|null $item
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setId($item['ID'])
                ->setCode($item['Code'])
                ->setCategory($item['Categorie'])
                ->setBalance($item['Saldo']);
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return EboekhoudenBalance
     */
    public function setId(int $id): EboekhoudenBalance
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return EboekhoudenBalance
     */
    public function setCode(string $code): EboekhoudenBalance
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return EboekhoudenBalance
     */
    public function setCategory(string $category): EboekhoudenBalance
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param string $balance
     * @return EboekhoudenBalance
     */
    public function setBalance(float $balance): EboekhoudenBalance
    {
        $this->balance = $balance;

        return $this;
    }
}
