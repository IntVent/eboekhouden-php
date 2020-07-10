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
    protected float $amount = 0;
    protected string $vat_code = '';
    protected float $vat_percentage = 0;
    protected ?string $invoice_number = null;
    protected ?string $ledger_code = null;

    /**
     * EboekhoudenMutationLine constructor.
     * @param array|null $item
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setAmount($item['BedragExclBTW'])
                ->setVatCode($item['BTWCode'])
                ->setVatPercentage($item['BTWPercentage'])
                ->setLedgerCode($item['TegenrekeningCode']);
        }
    }

    /**
     * Get the amount without vat
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return EboekhoudenMutationLine
     */
    public function setAmount(float $amount): EboekhoudenMutationLine
    {
        $this->amount = $amount;

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
     * @return string|null
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoice_number;
    }

    /**
     * @param string|null $invoice_number
     * @return EboekhoudenMutationLine
     */
    public function setInvoiceNumber(?string $invoice_number): EboekhoudenMutationLine
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLedgerCode(): ?string
    {
        return $this->ledger_code;
    }

    /**
     * @param string|null $ledger_code
     * @return EboekhoudenMutationLine
     */
    public function setLedgerCode(?string $ledger_code): EboekhoudenMutationLine
    {
        $this->ledger_code = $ledger_code;

        return $this;
    }
}
