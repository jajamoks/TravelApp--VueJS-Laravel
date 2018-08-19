<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingListItem extends Model
{
    protected $fillable = [
        'name','description','link'
    ];
}
