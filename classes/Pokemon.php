<?php
abstract class Pokemon {
    protected string $name;
    protected string $type;
    protected int $level;
    protected int $hp;

    public function __construct(string $name, string $type, int $level = 1, int $hp = 50){
        $this->name = $name;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
    }

    public function getName(): string { return $this->name; }
    public function getType(): string { return $this->type; }
    public function getLevel(): int { return $this->level; }
    public function getHp(): int { return $this->hp; }

    public function train(string $trainingType, int $intensity): array {
        $beforeLevel = $this->level;
        $beforeHp = $this->hp;

        switch(strtolower($trainingType)) {
            case 'attack':
                $this->level += floor($intensity / 5);
                $this->hp += floor($intensity * 2);
                break;
            case 'defense':
                $this->level += floor($intensity / 6);
                $this->hp += floor($intensity * 3);
                break;
            case 'speed':
                $this->level += floor($intensity / 7);
                $this->hp += floor($intensity * 1.5);
                break;
        }

        return [
            "before" => ["level" => $beforeLevel, "hp" => $beforeHp],
            "after"  => ["level" => $this->level, "hp" => $this->hp],
            "special" => $this->specialMove()
        ];
    }

    abstract public function specialMove(): string;
}
