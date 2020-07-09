<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenInvoice implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected string $invoice_number = '';
    protected string $relation_code = '';
    protected ?DateTime $date = null;
    protected int $payment_term = 0;
    protected string $description = '';
    protected array $lines = [];

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoice_number;
    }

    /**
     * @param  string  $invoice_number
     * @return EboekhoudenInvoice
     */
    public function setInvoiceNumber(string $invoice_number): EboekhoudenInvoice
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    /**
     * @return string
     */
    public function getRelationCode(): string
    {
        return $this->relation_code;
    }

    /**
     * @param  string  $relation_code
     * @return EboekhoudenInvoice
     */
    public function setRelationCode(string $relation_code): EboekhoudenInvoice
    {
        $this->relation_code = $relation_code;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param  DateTime|null  $date
     * @return EboekhoudenInvoice
     */
    public function setDate(?DateTime $date): EboekhoudenInvoice
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentTerm(): int
    {
        return $this->payment_term;
    }

    /**
     * @param  int  $payment_term
     * @return EboekhoudenInvoice
     * @throws EboekhoudenException
     */
    public function setPaymentTerm(int $payment_term): EboekhoudenInvoice
    {
        if ($payment_term < 0) {
            throw new EboekhoudenException("Payment term must be a positive integer");
        }

        $this->payment_term = $payment_term;

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
     * @return EboekhoudenInvoice
     */
    public function setDescription(string $description): EboekhoudenInvoice
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return EboekhoudenInvoiceLine[]
     */
    public function getLines(): array
    {
        if (empty($this->lines)) {
            return [];
        }

        return $this->lines;
    }

    /**
     * @param  EboekhoudenInvoiceLine  $line
     * @return EboekhoudenInvoice
     */
    public function addLine(EboekhoudenInvoiceLine $line): EboekhoudenInvoice
    {
        if (empty($this->lines)) {
            $this->lines = [];
        }

        $this->lines[] = $line;

        return $this;
    }

    /**
     * @param  array  $lines
     * @return EboekhoudenInvoice
     * @throws EboekhoudenException
     */
    public function setLines(array $lines): EboekhoudenInvoice
    {
        foreach ($lines as $line) {
            if (! ($line instanceof EboekhoudenInvoiceLine)) {
                throw new EboekhoudenException('All invoice lines must be instance of '.EboekhoudenInvoiceLine::class);
            }
        }
        $this->lines = $lines;

        return $this;
    }
}
