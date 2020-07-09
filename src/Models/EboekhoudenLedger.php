<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Exceptions\EboekhoudenException;

class EboekhoudenLedger
{
    protected int $id = 0;
    protected string $code = '';
    protected string $description = '';
    protected string $category = '';
    protected string $group = '';

    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setId($item['ID'])
                ->setCode($item['Code'])
                ->setDescription($item['Omschrijving'])
                ->setCategory($this->parseCategory($item['Categorie']))
                ->setGroup($item['Groep']);
        }
    }

    protected function parseCategory(string $category): string
    {
        switch ($category) {
            case 'VW':
                return 'PROFIT_LOSS';

            case 'BAL':
                return 'BALANCE';

            case 'FIN':
                return 'FINANCE';

            case 'DEB':
                return 'DEBTORS';

            case 'CRED':
                return 'CREDITORS';

            case 'VOOR':
                return 'PAID_TAXES';
        }

        return $category;
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
     * @return EboekhoudenLedger
     * @throws EboekhoudenException
     */
    public function setId(int $id): EboekhoudenLedger
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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return EboekhoudenLedger
     */
    public function setCode(string $code): EboekhoudenLedger
    {
        $this->code = $code;

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
     * @return EboekhoudenLedger
     */
    public function setDescription(string $description): EboekhoudenLedger
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return EboekhoudenLedger
     */
    public function setCategory(string $category): EboekhoudenLedger
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     * @return EboekhoudenLedger
     */
    public function setGroup(string $group): EboekhoudenLedger
    {
        $this->group = $group;

        return $this;
    }
}
