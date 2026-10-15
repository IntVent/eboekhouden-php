<?php

namespace IntVent\EBoekhouden\Filters;

use DateTime;

class SaldiFilter
{
    protected int $cost_center_id = 0;
    protected ?DateTime $date_from = null;
    protected ?DateTime $date_to = null;
    protected string $category = '';

    /**
     * @return int
     */
    public function getCostCenterId(): int
    {
        return $this->cost_center_id;
    }

    /**
     * @param int $cost_center_id
     * @return SaldiFilter
     */
    public function setCostCenterId(int $cost_center_id): SaldiFilter
    {
        $this->cost_center_id = $cost_center_id;

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
     * @return SaldiFilter
     */
    public function setDateFrom(?DateTime $date_from): SaldiFilter
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
     * @return SaldiFilter
     */
    public function setDateTo(?DateTime $date_to): SaldiFilter
    {
        $this->date_to = $date_to;

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
     * @param  string  $category
     * @return SaldiFilter
     */
    public function setCategory(string $category): SaldiFilter
    {
        $this->category = $category;

        return $this;
    }
}
