<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'alias', 'description', 'text'];
    protected $updated_at = false;
    protected $created_at = false;
}
