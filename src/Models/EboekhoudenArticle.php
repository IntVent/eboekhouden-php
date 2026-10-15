<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenArticle implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected int $id = 0;
    protected string $description = '';
    protected string $code = '';
    protected string $group_description = '';
    protected string $group_code = '';
    protected string $unit = '';
    protected float $purchase_price_excl_vat = 0.0;
    protected float $price_excl_vat = 0.0;
    protected float $price_incl_vat = 0.0;
    protected string $tax_code = '';
    protected string $ledger_code = '';
    protected float $tax_percentage = 0.0;
    protected int $cost_center_id = 0;
    protected bool $active = false;

    /**
     * EboekhoudenArticle constructor.
     * @param array|null $item
     * @throws EboekhoudenException
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setId($item['ArtikelID'])
                ->setDescription($item['ArtikelOmschrijving'])
                ->setCode($item['ArtikelCode'])
                ->setGroupDescription($item['GroepOmschrijving'])
                ->setGroupCode($item['GroepCode'])
                ->setUnit($item['Eenheid'])
                ->setPurchasePriceExclVat($item['InkoopprijsExclBTW'])
                ->setPriceExclVat($item['VerkoopprijsExclBTW'])
                ->setPriceInclVat($item['VerkoopprijsInclBTW'])
                ->setTaxCode($item['BTWCode'])
                ->setLedgerCode($item['TegenrekeningCode'])
                ->setTaxPercentage($item['BtwPercentage'])
                ->setCostCenterId($item['KostenplaatsID'])
                ->setActive($item['Actief']);
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
     * @return EboekhoudenArticle
     * @throws EboekhoudenException
     */
    public function setId(int $id): EboekhoudenArticle
    {
        if ($id < 0) {
            throw new EboekhoudenException('Id must be a positive integer');
        }
        $this->id = $id;

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
     * @param string $description
     * @return EboekhoudenArticle
     */
    public function setDescription(string $description): EboekhoudenArticle
    {
        $this->description = $description;

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
     * @return EboekhoudenArticle
     */
    public function setCode(string $code): EboekhoudenArticle
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupDescription(): string
    {
        return $this->group_description;
    }

    /**
     * @param string $group_description
     * @return EboekhoudenArticle
     */
    public function setGroupDescription(string $group_description): EboekhoudenArticle
    {
        $this->group_description = $group_description;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupCode(): string
    {
        return $this->group_code;
    }

    /**
     * @param string $group_code
     * @return EboekhoudenArticle
     */
    public function setGroupCode(string $group_code): EboekhoudenArticle
    {
        $this->group_code = $group_code;

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
     * @param string $unit
     * @return EboekhoudenArticle
     */
    public function setUnit(string $unit): EboekhoudenArticle
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return float
     */
    public function getPurchasePriceExclVat(): float
    {
        return $this->purchase_price_excl_vat;
    }

    /**
     * @param float $purchase_price_excl_vat
     * @return EboekhoudenArticle
     */
    public function setPurchasePriceExclVat(float $purchase_price_excl_vat): EboekhoudenArticle
    {
        $this->purchase_price_excl_vat = $purchase_price_excl_vat;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriceExclVat(): float
    {
        return $this->price_excl_vat;
    }

    /**
     * @param float $price_excl_vat
     * @return EboekhoudenArticle
     */
    public function setPriceExclVat(float $price_excl_vat): EboekhoudenArticle
    {
        $this->price_excl_vat = $price_excl_vat;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriceInclVat(): float
    {
        return $this->price_incl_vat;
    }

    /**
     * @param float $price_incl_vat
     * @return EboekhoudenArticle
     */
    public function setPriceInclVat(float $price_incl_vat): EboekhoudenArticle
    {
        $this->price_incl_vat = $price_incl_vat;

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
     * @param string $tax_code
     * @return EboekhoudenArticle
     */
    public function setTaxCode(string $tax_code): EboekhoudenArticle
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
     * @return EboekhoudenArticle
     */
    public function setLedgerCode(string $ledger_code): EboekhoudenArticle
    {
        $this->ledger_code = $ledger_code;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxPercentage(): float
    {
        return $this->tax_percentage;
    }

    /**
     * @param float $tax_percentage
     * @return EboekhoudenArticle
     */
    public function setTaxPercentage(float $tax_percentage): EboekhoudenArticle
    {
        $this->tax_percentage = $tax_percentage;

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
     * @return EboekhoudenArticle
     */
    public function setCostCenterId(int $cost_center_id): EboekhoudenArticle
    {
        $this->cost_center_id = $cost_center_id;

        return $this;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return EboekhoudenArticle
     */
    public function setActive(bool $active): EboekhoudenArticle
    {
        $this->active = $active;

        return $this;
    }
}
