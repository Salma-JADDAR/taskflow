<?php
declare(strict_types=1);

namespace App\Entities;

class BugTask extends Task
{
    public function getRequiredSkills(): array
    {
        return [
            'Debugging',
            'Code Analysis'
        ];
    }

    public function calculateComplexity(): int
    {
        $skillsCount = count($this->getRequiredSkills());

        if ($this->estimatedHours <= 5) {
            return $skillsCount;
        } elseif ($this->estimatedHours <= 15) {
            return $skillsCount + 1;
        }

        return $skillsCount + 2;
    }
}
