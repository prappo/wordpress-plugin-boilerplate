<?php

namespace Prappo\WpEloquent\Database\Eloquent\Relations;

use Prappo\WpEloquent\Database\Eloquent\Model;
use Prappo\WpEloquent\Database\Eloquent\Relations\Concerns\AsPivot;

class Pivot extends Model
{
    use AsPivot;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
