<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscapeReadingList extends Model
{
    public function items()
    {
        return $this->hasMany(ReadingListItem::class);
    }
}
