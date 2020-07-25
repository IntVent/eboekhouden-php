<?php

namespace IntVent\EBoekhouden\Filters;

class LedgerFilter
{
    protected string $id = '';
    protected string $code = '';
    protected string $category = '';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return LedgerFilter
     */
    public function setId(string $id): LedgerFilter
    {
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
     * @return LedgerFilter
     */
    public function setCode(string $code): LedgerFilter
    {
        $this->code = $code;

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
     * @return LedgerFilter
     */
    public function setCategory(string $category): LedgerFilter
    {
        $this->category = $category;

        return $this;
    }
}
