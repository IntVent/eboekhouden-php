<?php

namespace IntVent\EBoekhouden\Filters;

class CostPlacementFilter
{
    protected int $cost_placement_id = 0;
    protected int $cost_placement_parent_id = 0;
    protected string $description = '';

    /**
     * @return int
     */
    public function getCostPlacementId(): int
    {
        return $this->cost_placement_id;
    }

    /**
     * @param int $cost_placement_id
     * @return CostPlacementFilter
     */
    public function setCostPlacementId(int $cost_placement_id): CostPlacementFilter
    {
        $this->cost_placement_id = $cost_placement_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getCostPlacementParentId(): int
    {
        return $this->cost_placement_parent_id;
    }

    /**
     * @param int $cost_placement_parent_id
     * @return CostPlacementFilter
     */
    public function setCostPlacementParentId(int $cost_placement_parent_id): CostPlacementFilter
    {
        $this->cost_placement_parent_id = $cost_placement_parent_id;

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
     * @return CostPlacementFilter
     */
    public function setDescription(string $description): CostPlacementFilter
    {
        $this->description = $description;

        return $this;
    }
}
