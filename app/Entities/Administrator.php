<?php
declare(strict_types=1);

namespace App\Entities;
class Administrator extends TeamMember{
    public function canCreateProject(): bool{
        return true;
    }

    public function canAssignTasks(): bool{
        return true;
    }

    public function getRolePermissions(): array{
        return [
            ' can_manage_team',
            'can_manage_mwmbers',
             'create_project',
            'assign_tasks',
        ];
   
}
}