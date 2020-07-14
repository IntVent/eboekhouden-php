<?php

namespace IntVent\EBoekhouden\Filters;

use DateTime;

class MutationFilter
{
    protected int $mutation_number = 0;
    protected int $mutation_number_from = 0;
    protected int $mutation_number_to = 0;
    protected string $invoice_number = '';
    protected ?DateTime $date_from = null;
    protected ?DateTime $date_to = null;

    /**
     * @return int
     */
    public function getMutationNumber(): int
    {
        return $this->mutation_number;
    }

    /**
     * @param  int  $mutation_number
     * @return MutationFilter
     */
    public function setMutationNumber(int $mutation_number): MutationFilter
    {
        $this->mutation_number = $mutation_number;

        return $this;
    }

    /**
     * @return int
     */
    public function getMutationNumberFrom(): int
    {
        return $this->mutation_number_from;
    }

    /**
     * @param  int  $mutation_number_from
     * @return MutationFilter
     */
    public function setMutationNumberFrom(int $mutation_number_from): MutationFilter
    {
        $this->mutation_number_from = $mutation_number_from;

        return $this;
    }

    /**
     * @return int
     */
    public function getMutationNumberTo(): int
    {
        return $this->mutation_number_to;
    }

    /**
     * @param  int  $mutation_number_to
     * @return MutationFilter
     */
    public function setMutationNumberTo(int $mutation_number_to): MutationFilter
    {
        $this->mutation_number_to = $mutation_number_to;

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
     * @param  string  $invoice_number
     * @return MutationFilter
     */
    public function setInvoiceNumber(string $invoice_number): MutationFilter
    {
        $this->invoice_number = $invoice_number;

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
     * @return MutationFilter
     */
    public function setDateFrom(?DateTime $date_from): MutationFilter
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
     * @return MutationFilter
     */
    public function setDateTo(?DateTime $date_to): MutationFilter
    {
        $this->date_to = $date_to;

        return $this;
    }
}
