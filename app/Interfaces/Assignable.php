<?php
declare(strict_types=1);

namespace App\Interfaces;

interface Assignable
{
    
    public function assignTo(int $userId): void;
    public function unassign(): void;
    public function getAssigneeId(): ?int;
    public function isAssigned(): bool;
}
