<?php

namespace Prappo\WpEloquent\Database\Eloquent;

interface Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Prappo\WpEloquent\Database\Eloquent\Builder  $builder
     * @param  \Prappo\WpEloquent\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model);
}
