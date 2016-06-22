<?php
namespace App\Domain\Label\Infrastructure;

use App\Domain\Label\Repository;
use App\Domain\Label\Label;

class LabelLocalizationRepository implements Repository
{
    const LOCALE_SPANISH = 'es';

    public function find($key)
    {
        $labelId = 'labels.' . $key;
        $value = $this->findLabel($labelId);
        return new Label($key, $value);
    }

    private function findLabel($labelId)
    {
        $value = trans($labelId, [], 'messages', self::LOCALE_SPANISH);
        return $value;
    }
}