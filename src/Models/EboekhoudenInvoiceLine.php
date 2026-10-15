<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenInvoiceLine implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected float $amount = 0;
    protected string $unit = 'stuk';
    protected string $code = '';
    protected string $description = '';
    protected float $price = 0;
    protected string $tax_code = '';
    protected string $ledger_code = '';
    protected int $cost_center_id = 0;

    /**
     * EboekhoudenInvoiceLine constructor.
     * @param  array|null  $item
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setAmount($item['Aantal'])
                ->setUnit($item['Eenheid'])
                ->setCode($item['Code'])
                ->setDescription($item['Omschrijving'])
                ->setPrice($item['PrijsPerEenheid'])
                ->setTaxCode($item['BTWCode'])
                ->setLedgerCode($item['TegenrekeningCode'])
                ->setCostCenterId($item['KostenplaatsID']);
        }
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param  float  $amount
     * @return EboekhoudenInvoiceLine
     */
    public function setAmount(float $amount): EboekhoudenInvoiceLine
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param  string  $unit
     * @return EboekhoudenInvoiceLine
     */
    public function setUnit(string $unit): EboekhoudenInvoiceLine
    {
        $this->unit = $unit;

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
     * @param  string  $code
     * @return EboekhoudenInvoiceLine
     */
    public function setCode(string $code): EboekhoudenInvoiceLine
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param  string  $description
     * @return EboekhoudenInvoiceLine
     */
    public function setDescription(string $description): EboekhoudenInvoiceLine
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param  float  $price
     * @return EboekhoudenInvoiceLine
     */
    public function setPrice(float $price): EboekhoudenInvoiceLine
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxCode(): string
    {
        return $this->tax_code;
    }

    /**
     * @param  string  $tax_code
     * @return EboekhoudenInvoiceLine
     */
    public function setTaxCode(string $tax_code): EboekhoudenInvoiceLine
    {
        $this->tax_code = $tax_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getLedgerCode(): string
    {
        return $this->ledger_code;
    }

    /**
     * @param string $ledger_code
     * @return EboekhoudenInvoiceLine
     */
    public function setLedgerCode(string $ledger_code): EboekhoudenInvoiceLine
    {
        $this->ledger_code = $ledger_code;

        return $this;
    }

    /**
     * @return int
     */
    public function getCostCenterId(): int
    {
        return $this->cost_center_id;
    }

    /**
     * @param int $cost_center_id
     * @return EboekhoudenInvoiceLine
     */
    public function setCostCenterId(int $cost_center_id): EboekhoudenInvoiceLine
    {
        $this->cost_center_id = $cost_center_id;

        return $this;
    }
}
