<?php

declare(strict_types=1);

namespace YNAB\Model\Errors;

class ErrorDetail implements ErrorDetailInterface
{
    private string $id;
    private string $name;
    private string $detail;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ErrorDetail
     */
    public function setId(string $id): ErrorDetail
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ErrorDetail
     */
    public function setName(string $name): ErrorDetail
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * @param string $detail
     * @return ErrorDetail
     */
    public function setDetail(string $detail): ErrorDetail
    {
        $this->detail = $detail;
        return $this;
    }
}
