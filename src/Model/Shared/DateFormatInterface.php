<?php

declare(strict_types=1);

namespace YNAB\Model\Shared;

interface DateFormatInterface
{
    /**
     * @return string
     */
    public function getFormat(): string;
}
