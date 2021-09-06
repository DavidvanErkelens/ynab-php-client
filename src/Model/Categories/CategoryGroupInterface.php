<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

interface CategoryGroupInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * Whether or not the category group is hidden
     * @return bool
     */
    public function isHidden(): bool;

    /**
     * Whether or not the category group has been deleted. Deleted category groups will only be included in delta
     * requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
