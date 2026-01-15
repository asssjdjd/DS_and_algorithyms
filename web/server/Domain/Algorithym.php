<?php

namespace App\Domain;

class Algorithym
{
    private string $id;
    private string $name;
    private string $group;
    private string $description;

    public function __construct(string $id, string $name, string $group, string $description = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->group = $group;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'group' => $this->group,
            'description' => $this->description,
        ];
    }
}