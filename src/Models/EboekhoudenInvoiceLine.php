<?php

namespace IntVent\EBoekhouden\Models;

class EboekhoudenInvoiceLine
{
    protected float $amount = 0;
    protected string $unit = 'piece';
    protected string $code = '';
    protected string $description = '';
    protected float $price = 0;
    protected string $tax_code = '';
    protected string $ledger_code = '';
    protected int $cost_placement_id = 0;

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
     * @param  string  $ledger_code
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
    public function getCostPlacementId(): string
    {
        return $this->cost_placement_id;
    }

    /**
     * @param  int  $cost_placement_id
     * @return EboekhoudenInvoiceLine
     */
    public function setCostPlacementId(int $cost_placement_id): EboekhoudenInvoiceLine
    {
        $this->cost_placement_id = $cost_placement_id;

        return $this;
    }
}
