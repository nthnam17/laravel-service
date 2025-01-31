<?php

namespace App\ValueObject;

use Carbon\CarbonImmutable;
use Throwable;

final class Date
{
    private CarbonImmutable $date;

    public function __construct(string $date)
    {
        try {
            $this->date = new CarbonImmutable($date);
        } catch (Throwable $e) {
            // throw new Unth('Invalid date format.');
        }
    }

    public static function fromString(string $date): self
    {
        return new static($date);
    }

    public function getDate(): CarbonImmutable
    {
        return $this->date;
    }

    public function equals(Date $otherDate): bool
    {
        return $this->date->eq($otherDate->getDate());
    }

    public function isBefore(Date $otherDate): bool
    {
        return $this->date->lt($otherDate->getDate());
    }

    public function isAfter(Date $otherDate): bool
    {
        return $this->date->gt($otherDate->getDate());
    }

    public function format(string $format = 'Y-m-d'): string
    {
        return $this->date->format($format);
    }

    public function addDays(int $days): Date
    {
        return new self($this->date->addDays($days));
    }

    public function subDays(int $days): Date
    {
        return new self($this->date->subDays($days));
    }
}
