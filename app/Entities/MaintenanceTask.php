<?php
declare(strict_types=1);

namespace App\Entities;

class MaintenanceTask extends Task
{
    public function getRequiredSkills(): array
    {
        return [
            'System Maintenance'
        ];
    }

    public function calculateComplexity(): int
    {
        if ($this->estimatedHours <= 5) {
            return 1;
        } elseif ($this->estimatedHours <= 10) {
            return 2;
        }

        return 3;
    }
}
