<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscapePackingList extends Model
{
    public function items()
    {
        return $this->hasMany(PackingListItem::class);
    }
}
