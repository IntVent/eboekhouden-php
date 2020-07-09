<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenRelation implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected ?int $id = null;
    protected ?DateTime $add_date = null;
    protected int $code = 0;
    protected string $company = '';
    protected ?string $contact = null;
    protected ?string $gender = null;
    protected ?string $address = null;
    protected ?string $zipcode = null;
    protected ?string $city = null;
    protected ?string $country = null;
    protected ?string $phone = null;
    protected ?string $cell_phone = null;
    protected ?string $email = null;
    protected ?string $site = null;
    protected ?string $notes = null;
    protected ?string $vat_number = null;

    /**
     * EboekhoudenRelation constructor.
     * @param array|null $item
     * @throws EboekhoudenException
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setId($item['ID'])
                ->setAddDate(new DateTime($item['AddDatum']))
                ->setCode((int)$item['Code'])
                ->setCompany($item['Bedrijf'])
                ->setContact($item['Contactpersoon'])
                ->setGender($item['Geslacht'])
                ->setAddress($item['Adres'])
                ->setZipcode($item['Postcode'])
                ->setCity($item['Plaats'])
                ->setCountry($item['Land'])
                ->setPhone($item['Telefoon'])
                ->setCellPhone($item['GSM'])
                ->setEmail($item['Email'])
                ->setSite($item['Site'])
                ->setNotes($item['Notitie'])
                ->setVatNumber($item['BTWNummer']);
        }
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return EboekhoudenRelation
     * @throws EboekhoudenException
     */
    public function setId(?int $id): EboekhoudenRelation
    {
        if ($id < 0) {
            throw new EboekhoudenException('Id must be a positive integer');
        }
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getAddDate(): ?\DateTime
    {
        return $this->add_date;
    }

    /**
     * @param \DateTime|null $add_date
     * @return EboekhoudenRelation
     */
    public function setAddDate(?\DateTime $add_date): EboekhoudenRelation
    {
        if ($add_date) {
            $this->add_date = $add_date;
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return EboekhoudenRelation
     * @throws EboekhoudenException
     */
    public function setCode(int $code): EboekhoudenRelation
    {
        if ($code < 0) {
            throw new EboekhoudenException("Code must be a positive integer.");
        }
        $this->code = $code;

        return $this;
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
     * @return EboekhoudenRelation
     */
    public function setCompany(string $company): EboekhoudenRelation
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContact(): ?string
    {
        return $this->contact;
    }

    /**
     * @param string|null $contact
     * @return EboekhoudenRelation
     */
    public function setContact(?string $contact): EboekhoudenRelation
    {
        if ($contact) {
            $this->contact = $contact;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     * @return EboekhoudenRelation
     */
    public function setGender(?string $gender): EboekhoudenRelation
    {
        if ($gender) {
            $this->gender = $gender;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return EboekhoudenRelation
     */
    public function setAddress(?string $address): EboekhoudenRelation
    {
        if ($address) {
            $this->address = $address;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    /**
     * @param string|null $zipcode
     * @return EboekhoudenRelation
     */
    public function setZipcode(?string $zipcode): EboekhoudenRelation
    {
        if ($zipcode) {
            $zipcode = str_replace(' ', '', strtoupper($zipcode));
            $this->zipcode = $zipcode;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return EboekhoudenRelation
     */
    public function setCity(?string $city): EboekhoudenRelation
    {
        if ($city) {
            $city = ucfirst($city);
            $this->city = $city;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     * @return EboekhoudenRelation
     */
    public function setCountry(?string $country): EboekhoudenRelation
    {
        if ($country) {
            $country = ucfirst($country);
            $this->country = $country;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return EboekhoudenRelation
     */
    public function setPhone(?string $phone): EboekhoudenRelation
    {
        if ($phone) {
            $this->phone = $phone;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCellPhone(): ?string
    {
        return $this->cell_phone;
    }

    /**
     * @param string|null $cell_phone
     * @return EboekhoudenRelation
     */
    public function setCellPhone(?string $cell_phone): EboekhoudenRelation
    {
        if ($cell_phone) {
            $this->cell_phone = $cell_phone;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return EboekhoudenRelation
     */
    public function setEmail(?string $email): EboekhoudenRelation
    {
        if (empty($email)) {
            return $this;
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this;
        }

        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSite(): ?string
    {
        return $this->site;
    }

    /**
     * @param string|null $site
     * @return EboekhoudenRelation
     */
    public function setSite(?string $site): EboekhoudenRelation
    {
        if (empty($site)) {
            return $this;
        }

        if (! filter_var($site, FILTER_VALIDATE_URL)) {
            return $this;
        }

        $this->site = $site;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return EboekhoudenRelation
     */
    public function setNotes(?string $notes): EboekhoudenRelation
    {
        if ($notes) {
            $this->notes = $notes;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVatNumber(): ?string
    {
        return $this->vat_number;
    }

    /**
     * @param string|null $vat_number
     * @return EboekhoudenRelation
     */
    public function setVatNumber(?string $vat_number): EboekhoudenRelation
    {
        if ($vat_number) {
            $this->vat_number = $vat_number;
        }

        return $this;
    }
}
