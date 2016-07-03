<?php
namespace App\Domain\Label\Infrastructure;

use App\Domain\Label\Repository;
use App\Domain\Label\Label;

class LabelLocalizationRepository implements Repository
{
    const LOCALE_SPANISH = 'es';

    public function find($keys)
    {
        $results = [];
        foreach ($keys as $key)
        {
            $labelId = 'labels.' . $key;
            $value = $this->findLabel($labelId);
            array_push($results, new Label($key, $value));
        }
        return $results;
    }

    private function findLabel($labelId)
    {
        $value = trans($labelId, [], 'messages', self::LOCALE_SPANISH);
        return $value;
    }
}