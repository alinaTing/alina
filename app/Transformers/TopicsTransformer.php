<?php

namespace App\Transformers;

use App\Models\Ddos;
use League\Fractal\TransformerAbstract;

class DdosTransformer extends TransformerAbstract
{
    public function transform(Ddos $ddos)
    {
        return [
            'id'         => $ddos->id,
            'ip'         => $ddos->ip,
            'name'       => $ddos->name,
            'bps'        => $ddos->bps,
            'pps'        => $ddos->pps,
            'time_at'    => $ddos->time_at,
            'time'       => $ddos->time,
        ];
    }

}
