<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

class CategoryGroup implements CategoryGroupInterface
{
    private string $id;
    private string $name;
    private bool $hidden;
    private bool $deleted;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param string $id
     * @return CategoryGroup
     */
    public function setId(string $id): CategoryGroup
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return CategoryGroup
     */
    public function setName(string $name): CategoryGroup
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param bool $hidden
     * @return CategoryGroup
     */
    public function setHidden(bool $hidden): CategoryGroup
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @param bool $deleted
     * @return CategoryGroup
     */
    public function setDeleted(bool $deleted): CategoryGroup
    {
        $this->deleted = $deleted;
        return $this;
    }
}
