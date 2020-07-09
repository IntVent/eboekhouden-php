<?php

namespace IntVent\EBoekhouden\Traits;

trait ProtectedFieldsToArrayTrait
{
    public function toArray()
    {
        $return = get_object_vars($this);
        foreach ($return as $key => $value) {
            if (is_array($value)) {
                $return[$key] = array_map(
                    fn ($item): array => $item->toArray(),
                    $value
                );
            }
        }

        return $return;
    }
}
