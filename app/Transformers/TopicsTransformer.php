<?php

namespace App\Transformers;

use App\Models\Ddos;
use App\Models\Topic;
use League\Fractal\TransformerAbstract;

class TopicsTransformer extends TransformerAbstract
{
    public function transform(Topic $topic)
    {
        return $topic->toArray();
    }

}
