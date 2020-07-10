<?php

namespace IntVent\EBoekhouden\Filters;

class ArticleFilter
{
    protected int $id = 0;
    protected string $description = '';
    protected string $code = '';
    protected string $group_description = '';
    protected string $group_code = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ArticleFilter
     */
    public function setId(int $id): ArticleFilter
    {
        $this->id = $id;

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
     * @return ArticleFilter
     */
    public function setDescription(string $description): ArticleFilter
    {
        $this->description = $description;

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
     * @return ArticleFilter
     */
    public function setCode(string $code): ArticleFilter
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupDescription(): string
    {
        return $this->group_description;
    }

    /**
     * @param string $group_description
     * @return ArticleFilter
     */
    public function setGroupDescription(string $group_description): ArticleFilter
    {
        $this->group_description = $group_description;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupCode(): string
    {
        return $this->group_code;
    }

    /**
     * @param string $group_code
     * @return ArticleFilter
     */
    public function setGroupCode(string $group_code): ArticleFilter
    {
        $this->group_code = $group_code;

        return $this;
    }
}
