<?php


namespace App\Application\UseCase\Command;


class FinishPackageCommand
{
    /**
     * @var int
     */
    private $packageId;

    /**
     * FinishPackageCommand constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->packageId = $id;
    }

    /**
     * @return int
     */
    public function getPackageId(): int
    {
        return $this->packageId;
    }
}
