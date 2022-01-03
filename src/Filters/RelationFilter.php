<?php

namespace IntVent\EBoekhouden\Filters;

class RelationFilter
{
    protected int $id = 0;
    protected string $code = '';
    protected string $keyword = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RelationFilter
     */
    public function setId(int $id): RelationFilter
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
     * @return RelationFilter
     */
    public function setCode(string $code): RelationFilter
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     * @return RelationFilter
     */
    public function setKeyword(string $keyword): RelationFilter
    {
        $this->keyword = $keyword;

        return $this;
    }
}
