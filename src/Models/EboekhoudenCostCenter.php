<?php

namespace IntVent\EBoekhouden\Models;

use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenCostCenter implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected int $cost_center_id = 0;
    protected int $cost_center_parent_id = 0;
    protected string $description = '';

    /**
     * EboekhoudenCostCenter constructor.
     * @param array|null $item
     */
    public function __construct(?array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setCostCenterId($item['KostenplaatsId'])
                ->setCostCenterParentId($item['KostenplaatsParentId'])
                ->setDescription($item['Omschrijving']);
        }
    }

    /**
     * @return int
     */
    public function getCostCenterId(): int
    {
        return $this->cost_center_id;
    }

    /**
     * @param int $cost_center_id
     * @return EboekhoudenCostCenter
     */
    public function setCostCenterId(int $cost_center_id): EboekhoudenCostCenter
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
     * @return EboekhoudenCostCenter
     */
    public function setCostCenterParentId(int $cost_center_parent_id): EboekhoudenCostCenter
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
     * @return EboekhoudenCostCenter
     */
    public function setDescription(string $description): EboekhoudenCostCenter
    {
        $this->description = $description;

        return $this;
    }
}
