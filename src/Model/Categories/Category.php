<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

class Category implements CategoryInterface
{
    private string $id;
    private string $categoryGroupId;
    private string $name;
    private bool $hidden;
    private ?string $originalCategoryGroupId;
    private ?string $note;
    private int $budgeted;
    private int $activity;
    private int $balance;
    private ?string $goalType;
    private ?string $goalCreationMonth;
    private ?int $goalTarget;
    private ?string $goalTargetMonth;
    private ?int $goalPercentageComplete;
    private ?int $goalMonthsToBudget;
    private ?int $goalUnderFunded;
    private ?int $goalOverallFunded;
    private ?int $goalOverallLeft;
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
    public function getCategoryGroupId(): string
    {
        return $this->categoryGroupId;
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
     * @return string|null
     */
    public function getOriginalCategoryGroupId(): ?string
    {
        return $this->originalCategoryGroupId;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @return int
     */
    public function getBudgeted(): int
    {
        return $this->budgeted;
    }

    /**
     * @return int
     */
    public function getActivity(): int
    {
        return $this->activity;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return string|null
     */
    public function getGoalType(): ?string
    {
        return $this->goalType;
    }

    /**
     * @return string|null
     */
    public function getGoalCreationMonth(): ?string
    {
        return $this->goalCreationMonth;
    }

    /**
     * @return int|null
     */
    public function getGoalTarget(): ?int
    {
        return $this->goalTarget;
    }

    /**
     * @return string|null
     */
    public function getGoalTargetMonth(): ?string
    {
        return $this->goalTargetMonth;
    }

    /**
     * @return int|null
     */
    public function getGoalPercentageComplete(): ?int
    {
        return $this->goalPercentageComplete;
    }

    /**
     * @return int|null
     */
    public function getGoalMonthsToBudget(): ?int
    {
        return $this->goalMonthsToBudget;
    }

    /**
     * @return int|null
     */
    public function getGoalUnderFunded(): ?int
    {
        return $this->goalUnderFunded;
    }

    /**
     * @return int|null
     */
    public function getGoalOverallFunded(): ?int
    {
        return $this->goalOverallFunded;
    }

    /**
     * @return int|null
     */
    public function getGoalOverallLeft(): ?int
    {
        return $this->goalOverallLeft;
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
     * @return Category
     */
    public function setId(string $id): Category
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $categoryGroupId
     * @return Category
     */
    public function setCategoryGroupId(string $categoryGroupId): Category
    {
        $this->categoryGroupId = $categoryGroupId;
        return $this;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param bool $hidden
     * @return Category
     */
    public function setHidden(bool $hidden): Category
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @param string|null $originalCategoryGroupId
     * @return Category
     */
    public function setOriginalCategoryGroupId(?string $originalCategoryGroupId): Category
    {
        $this->originalCategoryGroupId = $originalCategoryGroupId;
        return $this;
    }

    /**
     * @param string|null $note
     * @return Category
     */
    public function setNote(?string $note): Category
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param int $budgeted
     * @return Category
     */
    public function setBudgeted(int $budgeted): Category
    {
        $this->budgeted = $budgeted;
        return $this;
    }

    /**
     * @param int $activity
     * @return Category
     */
    public function setActivity(int $activity): Category
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @param int $balance
     * @return Category
     */
    public function setBalance(int $balance): Category
    {
        $this->balance = $balance;
        return $this;
    }

    /**
     * @param string|null $goalType
     * @return Category
     */
    public function setGoalType(?string $goalType): Category
    {
        $this->goalType = $goalType;
        return $this;
    }

    /**
     * @param string|null $goalCreationMonth
     * @return Category
     */
    public function setGoalCreationMonth(?string $goalCreationMonth): Category
    {
        $this->goalCreationMonth = $goalCreationMonth;
        return $this;
    }

    /**
     * @param int|null $goalTarget
     * @return Category
     */
    public function setGoalTarget(?int $goalTarget): Category
    {
        $this->goalTarget = $goalTarget;
        return $this;
    }

    /**
     * @param string|null $goalTargetMonth
     * @return Category
     */
    public function setGoalTargetMonth(?string $goalTargetMonth): Category
    {
        $this->goalTargetMonth = $goalTargetMonth;
        return $this;
    }

    /**
     * @param int|null $goalPercentageComplete
     * @return Category
     */
    public function setGoalPercentageComplete(?int $goalPercentageComplete): Category
    {
        $this->goalPercentageComplete = $goalPercentageComplete;
        return $this;
    }

    /**
     * @param int|null $goalMonthsToBudget
     * @return Category
     */
    public function setGoalMonthsToBudget(?int $goalMonthsToBudget): Category
    {
        $this->goalMonthsToBudget = $goalMonthsToBudget;
        return $this;
    }

    /**
     * @param int|null $goalUnderFunded
     * @return Category
     */
    public function setGoalUnderFunded(?int $goalUnderFunded): Category
    {
        $this->goalUnderFunded = $goalUnderFunded;
        return $this;
    }

    /**
     * @param int|null $goalOverallFunded
     * @return Category
     */
    public function setGoalOverallFunded(?int $goalOverallFunded): Category
    {
        $this->goalOverallFunded = $goalOverallFunded;
        return $this;
    }

    /**
     * @param int|null $goalOverallLeft
     * @return Category
     */
    public function setGoalOverallLeft(?int $goalOverallLeft): Category
    {
        $this->goalOverallLeft = $goalOverallLeft;
        return $this;
    }

    /**
     * @param bool $deleted
     * @return Category
     */
    public function setDeleted(bool $deleted): Category
    {
        $this->deleted = $deleted;
        return $this;
    }
}
