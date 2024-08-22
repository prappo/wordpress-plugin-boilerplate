<?php

namespace Prappo\WpEloquent\Database\Eloquent\Factories;

use Prappo\WpEloquent\Database\Eloquent\Model;
use Prappo\WpEloquent\Database\Eloquent\Relations\MorphTo;

class BelongsToRelationship
{
    /**
     * The related factory instance.
     *
     * @var \Prappo\WpEloquent\Database\Eloquent\Factories\Factory
     */
    protected $factory;

    /**
     * The relationship name.
     *
     * @var string
     */
    protected $relationship;

    /**
     * The cached, resolved parent instance ID.
     *
     * @var mixed
     */
    protected $resolved;

    /**
     * Create a new "belongs to" relationship definition.
     *
     * @param  \Prappo\WpEloquent\Database\Eloquent\Factories\Factory  $factory
     * @param  string  $relationship
     * @return void
     */
    public function __construct(Factory $factory, $relationship)
    {
        $this->factory = $factory;
        $this->relationship = $relationship;
    }

    /**
     * Get the parent model attributes and resolvers for the given child model.
     *
     * @param  \Prappo\WpEloquent\Database\Eloquent\Model  $model
     * @return array
     */
    public function attributesFor(Model $model)
    {
        $relationship = $model->{$this->relationship}();

        return $relationship instanceof MorphTo ? [
            $relationship->getMorphType() => $this->factory->newModel()->getMorphClass(),
            $relationship->getForeignKeyName() => $this->resolver(),
        ] : [
            $relationship->getForeignKeyName() => $this->resolver(),
        ];
    }

    /**
     * Get the deferred resolver for this relationship's parent ID.
     *
     * @return \Closure
     */
    protected function resolver()
    {
        return function () {
            if (! $this->resolved) {
                return $this->resolved = $this->factory->create()->getKey();
            }

            return $this->resolved;
        };
    }
}
