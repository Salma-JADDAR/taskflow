<?php
declare(strict_types=1);

namespace App\Entities;

class Manager extends TeamMember{
    public function canCreateProject(): bool{
        return true;
    }

    public function canAssignTasks(): bool{
        return true;
    }

    public function getRolePermissions(): array{
        return [
            'create_project',
            'assign_tasks',
            'manage_tasks',
        ];
    }
}
