<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenOutstandingPost implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected ?DateTime $mutation_date = null;
    protected string $mutation_invoice = '';
    protected string $relation_code = '';
    protected string $relation_company = '';
    protected float $amount = 0.0;
    protected float $paid = 0.0;
    protected float $outstanding = 0.0;

    /**
     * EboekhoudenOutstandingPost constructor.
     * @param  array|null  $item
     * @throws \Exception
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setMutationDate(new DateTime($item['MutDatum']))
                ->setMutationInvoice($item['MutFactuur'])
                ->setRelationCode($item['RelCode'])
                ->setRelationCompany($item['RelBedrijf'])
                ->setAmount($item['Bedrag'])
                ->setPaid($item['Voldaan'])
                ->setOutstanding($item['Openstaand']);
        }
    }

    /**
     * @return DateTime|null
     */
    public function getMutationDate(): ?DateTime
    {
        return $this->mutation_date;
    }

    /**
     * @param  DateTime  $date
     * @return EboekhoudenOutstandingPost
     */
    public function setMutationDate(DateTime $date): EboekhoudenOutstandingPost
    {
        $this->mutation_date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getMutationInvoice(): string
    {
        return $this->mutation_invoice;
    }

    /**
     * @param  string  $mutation_invoice
     * @return EboekhoudenOutstandingPost
     */
    public function setMutationInvoice(string $mutation_invoice): EboekhoudenOutstandingPost
    {
        $this->mutation_invoice = $mutation_invoice;

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
     * @return EboekhoudenOutstandingPost
     */
    public function setRelationCode(string $relation_code): EboekhoudenOutstandingPost
    {
        $this->relation_code = $relation_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getRelationCompany(): string
    {
        return $this->relation_company;
    }

    /**
     * @param  string  $relation_company
     * @return EboekhoudenOutstandingPost
     */
    public function setRelationCompany(string $relation_company): EboekhoudenOutstandingPost
    {
        $this->relation_company = $relation_company;

        return $this;
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
     * @return EboekhoudenOutstandingPost
     */
    public function setAmount(float $amount): EboekhoudenOutstandingPost
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getPaid(): float
    {
        return $this->paid;
    }

    /**
     * @param  float  $paid
     * @return EboekhoudenOutstandingPost
     */
    public function setPaid(float $paid): EboekhoudenOutstandingPost
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return float
     */
    public function getOutstanding(): float
    {
        return $this->outstanding;
    }

    /**
     * @param  float  $outstanding
     * @return EboekhoudenOutstandingPost
     */
    public function setOutstanding(float $outstanding): EboekhoudenOutstandingPost
    {
        $this->outstanding = $outstanding;

        return $this;
    }
}
