<?php
declare(strict_types=1);

namespace App\Interfaces;

interface Prioritizable{
    
    public function setPriority(string $priority): void;
    public function getPriority(): string;
    public function comparePriority(self $task): int;
    public function isCritical(): bool;
}
