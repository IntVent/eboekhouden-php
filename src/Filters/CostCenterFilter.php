<?php

namespace IntVent\EBoekhouden\Filters;

class CostCenterFilter
{
    protected int $cost_center_id = 0;
    protected int $cost_center_parent_id = 0;
    protected string $description = '';

    /**
     * @return int
     */
    public function getCostCenterId(): int
    {
        return $this->cost_center_id;
    }

    /**
     * @param int $cost_center_id
     * @return CostCenterFilter
     */
    public function setCostCenterId(int $cost_center_id): CostCenterFilter
    {
        $this->cost_center_id = $cost_center_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getCostCenterParentId(): int
    {
        return $this->cost_center_parent_id;
    }

    /**
     * @param int $cost_center_parent_id
     * @return CostCenterFilter
     */
    public function setCostCenterParentId(int $cost_center_parent_id): CostCenterFilter
    {
        $this->cost_center_parent_id = $cost_center_parent_id;

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
     * @return CostCenterFilter
     */
    public function setDescription(string $description): CostCenterFilter
    {
        $this->description = $description;

        return $this;
    }
}
