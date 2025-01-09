<?php
declare(strict_types=1);

namespace App\Interfaces;

interface Commentable
{

    public function addComment(int $userId, string $comment): void;
    public function getComments(): array;
    public function countComments(): int;
    public function hasComments(): bool;
}
