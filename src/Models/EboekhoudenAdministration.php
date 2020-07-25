<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenAdministration implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected string $company = '';
    protected string $city = '';
    protected string $guid = '';
    protected string $start_bookyear = '';

    /**
     * EboekhoudenAdministration constructor.
     * @param array|null $item
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setCompany($item['Bedrijf'])
                ->setCity($item['Plaats'])
                ->setGuid($item['Guid'])
                ->setStartBookyear($item['StartBoekjaar'])
                ;
        }
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return EboekhoudenAdministration
     */
    public function setCompany(string $company): EboekhoudenAdministration
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return EboekhoudenAdministration
     */
    public function setCity(string $city): EboekhoudenAdministration
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * @param string $guid
     * @return EboekhoudenAdministration
     */
    public function setGuid(string $guid): EboekhoudenAdministration
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartBookyear(): string
    {
        return $this->start_bookyear;
    }

    /**
     * @param string $start_bookyear
     * @return EboekhoudenAdministration
     */
    public function setStartBookyear(string $start_bookyear): EboekhoudenAdministration
    {
        $this->start_bookyear = $start_bookyear;

        return $this;
    }
}
