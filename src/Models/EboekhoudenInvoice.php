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
    protected int $payment_term = 30;
    protected string $invoice_template = '';
    protected string $email_from_address = '';
    protected string $email_from_name = '';
    protected string $mutation_description = '';
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
    public function getInvoiceTemplate(): string
    {
        return $this->invoice_template;
    }

    /**
     * @param  string  $invoice_template
     * @return EboekhoudenInvoice
     */
    public function setInvoiceTemplate(string $invoice_template): EboekhoudenInvoice
    {
        $this->invoice_template = $invoice_template;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailFromAddress(): string
    {
        return $this->email_from_address;
    }

    /**
     * @param  string  $email_from_address
     * @return EboekhoudenInvoice
     */
    public function setEmailFromAddress(string $email_from_address): EboekhoudenInvoice
    {
        $this->email_from_address = $email_from_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailFromName(): string
    {
        return $this->email_from_name;
    }

    /**
     * @param  string  $email_from_name
     * @return EboekhoudenInvoice
     */
    public function setEmailFromName(string $email_from_name): EboekhoudenInvoice
    {
        $this->email_from_name = $email_from_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getMutationDescription(): string
    {
        return $this->mutation_description;
    }

    /**
     * @param  string  $mutation_description
     * @return EboekhoudenInvoice
     */
    public function setMutationDescription(string $mutation_description): EboekhoudenInvoice
    {
        $this->mutation_description = $mutation_description;

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
