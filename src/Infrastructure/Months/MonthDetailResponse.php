<?php

declare(strict_types=1);

namespace YNAB\Infrastructure\Months;

use YNAB\Infrastructure\Serialization\DeserializableObject;

/**
 * @extends DeserializableObject<MonthDetailResponse>
 */
class MonthDetailResponse extends DeserializableObject implements MonthDetailResponseInterface
{
    private MonthDetailResponseData $data;

    /**
     * @return MonthDetailResponseData
     */
    public function getData(): MonthDetailResponseData
    {
        return $this->data;
    }

    /**
     * @param MonthDetailResponseData $data
     * @return MonthDetailResponse
     */
    public function setData(MonthDetailResponseData $data): MonthDetailResponse
    {
        $this->data = $data;
        return $this;
    }
}
