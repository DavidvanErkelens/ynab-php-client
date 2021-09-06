<?php

declare(strict_types=1);

namespace YNAB\Model\Categories;

interface CategoryInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getCategoryGroupId(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * Whether or not the category is hidden
     * @return bool
     */
    public function isHidden(): bool;

    /**
     * If category is hidden this is the id of the category group it originally belonged to before it was hidden.
     * @return string|null
     */
    public function getOriginalCategoryGroupId(): ?string;

    /**
     * @return string|null
     */
    public function getNote(): ?string;

    /**
     * Budgeted amount in milliunits format
     * @return int
     */
    public function getBudgeted(): int;

    /**
     * Activity amount in milliunits format
     * @return int
     */
    public function getActivity(): int;

    /**
     * Balance in milliunits format
     * @return int
     */
    public function getBalance(): int;

    /**
     * The type of goal, if the category has a goal (TB=’Target Category Balance’, TBD=
     * ’Target Category Balance by Date’, MF=’Monthly Funding’, NEED=’Plan Your Spending’)
     * [ TB, TBD, MF, NEED, ]
     * @return string|null
     */
    public function getGoalType(): ?string;

    /**
     * The month a goal was created
     * @return string|null
     */
    public function getGoalCreationMonth(): ?string;

    /**
     * The goal target amount in milliunits
     * @return int|null
     */
    public function getGoalTarget(): ?int;

    /**
     * The original target month for the goal to be completed. Only some goal types specify this date.
     * @return string|null
     */
    public function getGoalTargetMonth(): ?string;

    /**
     * The percentage completion of the goal
     * @return int|null
     */
    public function getGoalPercentageComplete(): ?int;

    /**
     * The number of months, including the current month, left in the current goal period.
     * @return int|null
     */
    public function getGoalMonthsToBudget(): ?int;

    /**
     * The amount of funding still needed in the current month to stay on track towards completing the goal within the
     * current goal period. This amount will generally correspond to the ‘Underfunded’ amount in the web and mobile
     * clients except when viewing a category with a Needed for Spending Goal in a future month. The web and mobile
     * clients will ignore any funding from a prior goal period when viewing category with a Needed for Spending Goal
     * in a future month.
     * @return int|null
     */
    public function getGoalUnderFunded(): ?int;

    /**
     * The total amount funded towards the goal within the current goal period.
     * @return int|null
     */
    public function getGoalOverallFunded(): ?int;

    /**
     * The amount of funding still needed to complete the goal within the current goal period.
     * @return int|null
     */
    public function getGoalOverallLeft(): ?int;

    /**
     * Whether or not the category has been deleted. Deleted categories will only be included in delta requests.
     * @return bool
     */
    public function isDeleted(): bool;
}
