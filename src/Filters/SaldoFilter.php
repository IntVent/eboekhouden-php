<?php

namespace IntVent\EBoekhouden\Filters;

use DateTime;

class SaldoFilter
{
    protected string $ledger_code = '';
    protected int $cost_placement_id = 0;
    protected ?DateTime $date_from = null;
    protected ?DateTime $date_to = null;

    /**
     * @return string
     */
    public function getLedgerCode(): string
    {
        return $this->ledger_code;
    }

    /**
     * @param  string  $ledger_code
     * @return SaldoFilter
     */
    public function setLedgerCode(string $ledger_code): SaldoFilter
    {
        $this->ledger_code = $ledger_code;

        return $this;
    }

    /**
     * @return int
     */
    public function getCostPlacementId(): int
    {
        return $this->cost_placement_id;
    }

    /**
     * @param int $cost_placement_id
     * @return SaldoFilter
     */
    public function setCostPlacementId(int $cost_placement_id): SaldoFilter
    {
        $this->cost_placement_id = $cost_placement_id;

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
     * @return SaldoFilter
     */
    public function setDateFrom(?DateTime $date_from): SaldoFilter
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
     * @return SaldoFilter
     */
    public function setDateTo(?DateTime $date_to): SaldoFilter
    {
        $this->date_to = $date_to;

        return $this;
    }
}
