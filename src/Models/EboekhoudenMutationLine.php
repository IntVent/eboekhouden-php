<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenMutationLine implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    /**
     * @var float   The line amount without vat
     */
    protected float $entry_amount = 0.0;
    protected float $amount_excl_vat = 0.0;
    protected float $vat_amount = 0.0;
    protected float $amount_incl_vat = 0.0;
    protected string $vat_code = '';
    protected float $vat_percentage = 0.0;
    protected string $invoice_number = '';
    protected string $ledger_code = '';
    protected int $cost_center_id = 0;

    /**
     * EboekhoudenMutationLine constructor.
     * @param array|null $item
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setEntryAmount($item['BedragInvoer'])
                ->setAmountExclVat($item['BedragExclBTW'])
                ->setVatAmount($item['BedragBTW'])
                ->setAmountInclVat($item['BedragInclBTW'])
                ->setVatCode($item['BTWCode'])
                ->setVatPercentage($item['BTWPercentage'])
                ->setInvoiceNumber($item['Factuurnummer'])
                ->setLedgerCode($item['TegenrekeningCode'])
                ->setCostCenterId($item['KostenplaatsID']);
        }
    }

    /**
     * Get the amount without vat
     * @return float
     */
    public function getEntryAmount(): float
    {
        return $this->entry_amount;
    }

    /**
     * @param float $entry_amount
     * @return EboekhoudenMutationLine
     */
    public function setEntryAmount(float $entry_amount): EboekhoudenMutationLine
    {
        $this->entry_amount = $entry_amount;

        return $this;
    }

    /**
     * Get the amount without vat
     * @return float
     */
    public function getAmountExclVat(): float
    {
        return $this->amount_excl_vat;
    }

    /**
     * @param float $amount_excl_vat
     * @return EboekhoudenMutationLine
     */
    public function setAmountExclVat(float $amount_excl_vat): EboekhoudenMutationLine
    {
        $this->amount_excl_vat = $amount_excl_vat;

        return $this;
    }

    /**
     * Get the amount without vat
     * @return float
     */
    public function getVatAmount(): float
    {
        return $this->vat_amount;
    }

    /**
     * @param float $vat_amount
     * @return EboekhoudenMutationLine
     */
    public function setVatAmount(float $vat_amount): EboekhoudenMutationLine
    {
        $this->vat_amount = $vat_amount;

        return $this;
    }

    /**
     * Get the amount without vat
     * @return float
     */
    public function getAmountInclVat(): float
    {
        return $this->amount_incl_vat;
    }

    /**
     * @param float $amount_incl_vat
     * @return EboekhoudenMutationLine
     */
    public function setAmountInclVat(float $amount_incl_vat): EboekhoudenMutationLine
    {
        $this->amount_incl_vat = $amount_incl_vat;

        return $this;
    }

    /**
     * @return string
     */
    public function getVatCode(): string
    {
        return $this->vat_code;
    }

    /**
     * @param string $vat_code
     * @return EboekhoudenMutationLine
     */
    public function setVatCode(string $vat_code): EboekhoudenMutationLine
    {
        $this->vat_code = $vat_code;

        return $this;
    }

    /**
     * @return float
     */
    public function getVatPercentage(): float
    {
        return $this->vat_percentage;
    }

    /**
     * @param float $vat_percentage
     * @return EboekhoudenMutationLine
     */
    public function setVatPercentage(float $vat_percentage): EboekhoudenMutationLine
    {
        $this->vat_percentage = $vat_percentage;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoice_number;
    }

    /**
     * @param string $invoice_number
     * @return EboekhoudenMutationLine
     */
    public function setInvoiceNumber(string $invoice_number): EboekhoudenMutationLine
    {
        $this->invoice_number = $invoice_number;

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
     * @return EboekhoudenMutationLine
     */
    public function setLedgerCode(string $ledger_code): EboekhoudenMutationLine
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
     * @return EboekhoudenMutationLine
     */
    public function setCostCenterId(int $cost_center_id): EboekhoudenMutationLine
    {
        $this->cost_center_id = $cost_center_id;

        return $this;
    }
}
