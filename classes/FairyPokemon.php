<?php
require_once __DIR__ . '/Pokemon.php';

class FairyPokemon extends Pokemon {

    public function specialMove(): string {
        return "{$this->name} sings a soothing lullaby! (Puts opponent to sleep + small heal)";
    }

    public function train(string $trainingType, int $intensity): array {
        $result = parent::train($trainingType, $intensity);

        if ($intensity >= 7) {
            $this->hp += 3;
            $result['after']['hp'] = $this->hp;
            $result['special'] .= " Bonus: calming aura heals +3 HP.";
        }

        return $result;
    }
}
