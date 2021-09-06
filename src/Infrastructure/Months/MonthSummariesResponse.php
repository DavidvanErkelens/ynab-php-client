<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<MonthSummariesResponse>
 */
class MonthSummariesResponse extends DeserializableObject implements MonthSummariesResponseInterface
{
    private MonthSummariesResponseData $data;

    /**
     * @return MonthSummariesResponseData
     */
    public function getData(): MonthSummariesResponseData
    {
        return $this->data;
    }

    /**
     * @param MonthSummariesResponseData $data
     * @return MonthSummariesResponse
     */
    public function setData(MonthSummariesResponseData $data): MonthSummariesResponse
    {
        $this->data = $data;
        return $this;
    }
}
