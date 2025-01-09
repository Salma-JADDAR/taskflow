<?php
declare(strict_types=1);

namespace App\Entities;

class FeatureTask extends Task
{

    public function __construct(
    string $title,
    int $projectId,
    int $reporterId,
    string $priority = 'medium',
    string $status = 'todo',
    ?string $description = null,
    ?int $assigneeId = null,
    ?float $estimatedHours = null
){

        parent::__construct($title, $projectId, $reporterId, $priority, $status, $description, $assigneeId, $estimatedHours);
    }

   
    public function getRequiredSkills(): array
    {
        return [
            'Backend Development',
            'Frontend Development',
            'System Design'
        ];
    }

    public function calculateComplexity(): int
    {
        $skillsCount = count($this->getRequiredSkills());

        if ($this->estimatedHours <= 10) {
            return $skillsCount;
        } elseif ($this->estimatedHours <= 25) {
            return $skillsCount + 2;
        }

        return $skillsCount + 4;
    }
}
