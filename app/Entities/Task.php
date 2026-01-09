<?php
declare(strict_types=1);

namespace App\Entities;

use DateTime;

abstract class Task{
    private ?int $id = null;
    private string $title;
    private ?string $description = null;
    private int $projectId;
    private ?int $assigneeId = null;
    private int $reporterId;
    private string $priority; 
    private string $status;  
    private ?float $estimatedHours = null;
    private float $actualHours = 0.0;
    private ?DateTime $dueDate = null;
    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;


    public function __construct(string $title,int $projectId,int $reporterId,string $priority = 'medium',string $status = 'todo',?string $description = null,?int $assigneeId = null,?float $estimatedHours = null,?DateTime $dueDate = null) {
        $this->title = $title;
        $this->projectId = $projectId;
        $this->reporterId = $reporterId;
        $this->priority = $priority;
        $this->status = $status;
        $this->description = $description;
        $this->assigneeId = $assigneeId;
        $this->estimatedHours = $estimatedHours;
        $this->dueDate = $dueDate;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }


    abstract public function calculateComplexity(): int; 
    abstract public function getRequiredSkills(): array; 


    public function getId(): ?int{
        return $this->id;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function getDescription(): ?string{
        return $this->description;
    }

    public function getProjectId(): int{
        return $this->projectId;
    }

    public function getAssigneeId(): ?int{
        return $this->assigneeId;
    }

    public function getReporterId(): int{
        return $this->reporterId;
    }

    public function getPriority(): string{
        return $this->priority;
    }

    public function getStatus(): string{
        return $this->status;
    }

    public function getEstimatedHours(): ?float{
        return $this->estimatedHours;
    }

    public function getActualHours(): float{
        return $this->actualHours;
    }

    public function getDueDate(): ?DateTime
    {
        return $this->dueDate;
    }

    public function getCreatedAt(): DateTime{
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime{
        return $this->updatedAt;
    }

 
    public function setAssigneeId(?int $assigneeId): void{
        $this->assigneeId = $assigneeId;
        $this->updatedAt = new DateTime();
    }

    public function setStatus(string $status): void{
        $this->status = $status;
        $this->updatedAt = new DateTime();
    }

    public function setActualHours(float $hours): void{
        $this->actualHours = $hours;
        $this->updatedAt = new DateTime();
    }

    public function setPriority(string $priority): void{
        $this->priority = $priority;
        $this->updatedAt = new DateTime();
    }
}
