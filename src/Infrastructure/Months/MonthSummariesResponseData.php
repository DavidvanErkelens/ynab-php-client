<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

use YNAB\Model\Months\MonthSummary;

class MonthSummariesResponseData implements MonthSummariesResponseDataInterface
{
    /** @var MonthSummary[]  */
    private array $months;
    private int $serverKnowledge;

    /**
     * @return MonthSummary[]
     */
    public function getMonths(): array
    {
        return $this->months;
    }

    /**
     * @param MonthSummary[] $months
     * @return MonthSummariesResponseData
     */
    public function setMonths(array $months): MonthSummariesResponseData
    {
        $this->months = $months;
        return $this;
    }

    /**
     * @return int
     */
    public function getServerKnowledge(): int
    {
        return $this->serverKnowledge;
    }

    /**
     * @param int $serverKnowledge
     * @return MonthSummariesResponseData
     */
    public function setServerKnowledge(int $serverKnowledge): MonthSummariesResponseData
    {
        $this->serverKnowledge = $serverKnowledge;
        return $this;
    }
}
