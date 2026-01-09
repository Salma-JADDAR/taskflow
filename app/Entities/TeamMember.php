<?php
declare(strict_types=1);

namespace App\Entities;

abstract class TeamMember{
    protected ?int $id = null;
    protected  string $username;
    protected  string $email;
    protected  string $password; 
    protected  int $teamId;
    protected  ?string $createdAt = null; 

   
    public function __construct(string $username,string $email,string $password,int $teamId,?int $id = null,?string $createdAt = null) {
        $this->username = $username;
        $this->email = $email;
        $this->setPassword($password);;
        $this->teamId = $teamId;
        $this->id = $id;
        $this->createdAt = $createdAt ?? date('Y-m-d H:i:s');
    }

 
    public function getId(): ?int{
        return $this->id;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getTeamId(): int{
        return $this->teamId;
    }

    public function getCreatedAt(): string{
        return $this->createdAt;
    }

    public function setUsername(string $username): void{
        $this->username = $username;
    }

    public function setEmail(string $email): void{
        $this->email = $email;
    }

    public function setPassword(string $password): void{
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setTeamId(int $teamId): void{
        $this->teamId = $teamId;
    }
    
    public function verifyPassword(string $password): bool{
        return password_verify($password, $this->password);
    }

    
    abstract public function canCreateProject(): bool;
    abstract public function canAssignTasks(): bool;
    abstract public function getRolePermissions(): array;

    

}
