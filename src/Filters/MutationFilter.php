<?php

namespace IntVent\EBoekhouden\Filters;

use DateTime;

class MutationFilter
{
    protected int $mutation_number = 0;
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
