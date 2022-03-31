<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;

class EboekhoudenRelation implements Arrayable
{
    protected ?int $id = null;
    protected string $relation_type = 'B';
    protected string $la = '0';
    protected ?DateTime $add_date = null;
    protected string $code = '';
    protected string $company = '';
    protected ?string $contact = null;
    protected string $gender = '';
    protected ?string $address = null;
    protected ?string $zipcode = null;
    protected ?string $city = null;
    protected ?string $country = '';
    protected ?string $postal_address = '';
    protected ?string $postal_zipcode = '';
    protected ?string $postal_city = '';
    protected ?string $postal_country = null;
    protected ?string $fax = null;
    protected ?string $phone = null;
    protected ?string $cell_phone = null;
    protected ?string $email = null;
    protected ?string $site = null;
    protected ?string $notes = null;
    protected ?string $vat_number = null;
    protected ?string $salutation = null;
    protected ?string $iban = null;
    protected ?string $bic = null;
    protected ?int $default_ledger_id = null;
    protected bool $receive_newsletter = true;
    protected array $custom_fields = [];

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
                ->setRelationType($item['BP'] ?? '')
                ->setLa($item['LA'] ?? '')
                ->setAddDate(new DateTime($item['AddDatum']))
                ->setCode($item['Code'])
                ->setCompany($item['Bedrijf'])
                ->setContact($item['Contactpersoon'] ?? null)
                ->setGender($item['Geslacht'])
                ->setAddress($item['Adres'] ?? null)
                ->setZipcode($item['Postcode'] ?? null)
                ->setCity($item['Plaats'] ?? null)
                ->setCountry($item['Land'] ?? null)
                ->setPostalAddress($item['Adres2'] ?? null)
                ->setPostalZipcode($item['Postcode2'] ?? null)
                ->setPostalCity($item['Plaats2'] ?? null)
                ->setPostalCountry($item['Land2'] ?? null)
                ->setFax($item['FAX'] ?? null)
                ->setPhone($item['Telefoon'] ?? null)
                ->setCellPhone($item['GSM'] ?? null)
                ->setEmail($item['Email'] ?? null)
                ->setSite($item['Site'] ?? null)
                ->setNotes($item['Notitie'] ?? null)
                ->setIBAN($item['IBAN'] ?? null)
                ->setVatNumber($item['BTWNummer'] ?? null)
                ->setReceiveNewsletter(! ! ! $item['GeenEmail'])
                ->setCustomFields($item)
            ;
        }
    }

    public function toArray()
    {
        $return = get_object_vars($this);
        foreach ($return as $key => $value) {
            if ($key === 'custom_fields') {
                $return[$key] = $value;
            } elseif (is_array($value)) {
                $return[$key] = array_map(
                    fn ($item): array => $item->toArray(),
                    $value
                );
            }
        }

        return $return;
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
     * @return string
     */
    public function getRelationType(): string
    {
        return $this->relation_type;
    }

    /**
     * @param string $relation_type
     * @return EboekhoudenRelation
     */
    public function setRelationType(string $relation_type): EboekhoudenRelation
    {
        if ($relation_type) {
            $this->relation_type = $relation_type;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getLa(): string
    {
        return $this->la;
    }

    /**
     * @param string $la
     * @return EboekhoudenRelation
     */
    public function setLa(string $la): EboekhoudenRelation
    {
        if ($la) {
            $this->la = $la;
        }

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
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return EboekhoudenRelation
     */
    public function setCode(?string $code): EboekhoudenRelation
    {
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
    public function setCompany(?string $company): EboekhoudenRelation
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
     * @param string $contact
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
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
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
     * @param string $address
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
     * @param string $zipcode
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
     * @param string $city
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
     * @param string $country
     * @return EboekhoudenRelation
     */
    public function setCountry(?string $country): EboekhoudenRelation
    {
        if (! empty($country)) {
            $country = ucfirst($country);
        }
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalAddress(): ?string
    {
        return $this->postal_address;
    }

    /**
     * @param string $postal_address
     * @return EboekhoudenRelation
     */
    public function setPostalAddress(?string $postal_address): EboekhoudenRelation
    {
        $this->postal_address = $postal_address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalZipcode(): ?string
    {
        return $this->postal_zipcode;
    }

    /**
     * @param string $postal_zipcode
     * @return EboekhoudenRelation
     */
    public function setPostalZipcode(?string $postal_zipcode): EboekhoudenRelation
    {
        $this->postal_zipcode = $postal_zipcode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalCity(): ?string
    {
        return $this->postal_city;
    }

    /**
     * @param string $postal_city
     * @return EboekhoudenRelation
     */
    public function setPostalCity(?string $postal_city): EboekhoudenRelation
    {
        $this->postal_city = $postal_city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostalCountry(): ?string
    {
        return $this->postal_country;
    }

    /**
     * @param string $postal_country
     * @return EboekhoudenRelation
     */
    public function setPostalCountry(?string $postal_country): EboekhoudenRelation
    {
        $this->postal_country = $postal_country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return EboekhoudenRelation
     */
    public function setFax(?string $fax): EboekhoudenRelation
    {
        $this->fax = $fax;

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
     * @param string $phone
     * @return EboekhoudenRelation
     */
    public function setPhone(?string $phone): EboekhoudenRelation
    {
        $this->phone = $phone;

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
     * @param string $cell_phone
     * @return EboekhoudenRelation
     */
    public function setCellPhone(?string $cell_phone): EboekhoudenRelation
    {
        $this->cell_phone = $cell_phone;

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
     * @param string $email
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
     * @param string $site
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
     * @param string $notes
     * @return EboekhoudenRelation
     */
    public function setNotes(?string $notes): EboekhoudenRelation
    {
        $this->notes = $notes;

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
     * @param string $vat_number
     * @return EboekhoudenRelation
     */
    public function setVatNumber(?string $vat_number): EboekhoudenRelation
    {
        $this->vat_number = $vat_number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSalutation(): ?string
    {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     * @return EboekhoudenRelation
     */
    public function setSalutation(?string $salutation): EboekhoudenRelation
    {
        $this->salutation = $salutation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIBAN(): ?string
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return EboekhoudenRelation
     */
    public function setIBAN(?string $iban): EboekhoudenRelation
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBIC(): ?string
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     * @return EboekhoudenRelation
     */
    public function setBIC(?string $bic): EboekhoudenRelation
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDefaultLedgerId(): ?int
    {
        return $this->default_ledger_id;
    }

    /**
     * @param int $default_ledger_id
     * @return EboekhoudenRelation
     */
    public function setDefaultLedgerId(?int $default_ledger_id): EboekhoudenRelation
    {
        $this->default_ledger_id = $default_ledger_id;

        return $this;
    }

    /**
     * @return bool
     */
    public function getReceiveNewsletter(): bool
    {
        return $this->receive_newsletter;
    }

    /**
     * @param bool $receive_newsletter
     * @return EboekhoudenRelation
     */
    public function setReceiveNewsletter(?bool $receive_newsletter): EboekhoudenRelation
    {
        $this->receive_newsletter = $receive_newsletter;

        return $this;
    }

    /**
     * @return array
     */
    public function getCustomFields(): array
    {
        return $this->custom_fields;
    }

    /**
     * @param array $item
     * @return EboekhoudenRelation
     */
    public function setCustomFields(array $item): EboekhoudenRelation
    {
        for ($i = 1; $i <= 10; $i++) {
            $field = $item["Def$i"] ?? false;

            if ($field !== false) {
                $this->custom_fields["Def$i"] = $field;
            }
        }

        return $this;
    }
}
