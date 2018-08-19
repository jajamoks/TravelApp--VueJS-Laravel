<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingListItem extends Model
{
    protected $fillable = [
        'name','description','link'
    ];
}
