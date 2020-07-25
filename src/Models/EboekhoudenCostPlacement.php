<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenCostPlacement implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected int $cost_placement_id = 0;
    protected int $cost_placement_parent_id = 0;
    protected string $description = '';

    /**
     * EboekhoudenCostPlacement constructor.
     * @param array|null $item
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setCostPlacementId($item['KostenplaatsId'])
                ->setCostPlacementParentId($item['KostenplaatsParentId'])
                ->setDescription($item['Omschrijving']);
        }
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
     * @return EboekhoudenCostPlacement
     */
    public function setCostPlacementId(int $cost_placement_id): EboekhoudenCostPlacement
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
     * @return EboekhoudenCostPlacement
     */
    public function setCostPlacementParentId(int $cost_placement_parent_id): EboekhoudenCostPlacement
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
     * @return EboekhoudenCostPlacement
     */
    public function setDescription(string $description): EboekhoudenCostPlacement
    {
        $this->description = $description;

        return $this;
    }
}
