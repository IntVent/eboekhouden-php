<?php

namespace IntVent\EBoekhouden\Filters;

use DateTime;

class InvoiceFilter
{
    protected string $invoice_number = '';
    protected string $relation_code = '';
    protected ?DateTime $date_from = null;
    protected ?DateTime $date_to = null;

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoice_number;
    }

    /**
     * @param  string  $invoice_number
     * @return InvoiceFilter
     */
    public function setInvoiceNumber(string $invoice_number): InvoiceFilter
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
     * @return InvoiceFilter
     */
    public function setRelationCode(string $relation_code): InvoiceFilter
    {
        $this->relation_code = $relation_code;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateFrom(): ?DateTime
    {
        return $this->date_from;
    }

    /**
     * @param  DateTime|null  $date_from
     * @return InvoiceFilter
     */
    public function setDateFrom(?DateTime $date_from): InvoiceFilter
    {
        $this->date_from = $date_from;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTo(): ?DateTime
    {
        return $this->date_to;
    }

    /**
     * @param  DateTime|null  $date_to
     * @return InvoiceFilter
     */
    public function setDateTo(?DateTime $date_to): InvoiceFilter
    {
        $this->date_to = $date_to;

        return $this;
    }
}
