<?php

use Prappo\WpEloquent\Support\Arr;
use Prappo\WpEloquent\Support\HigherOrderTapProxy;
use Prappo\WpEloquent\Support\Collection;


if (! function_exists('asdb_class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object  $class
     * @return string
     */
    function asdb_class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (! function_exists('asdb_class_uses_recursive')) {
    /**
     * Returns all traits used by a class, its parent classes and trait of their traits.
     *
     * @param  object|string  $class
     * @return array
     */
    function asdb_class_uses_recursive($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $results = [];

        foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
            $results += asdb_trait_uses_recursive($class);
        }

        return array_unique($results);
    }
}

if (! function_exists('asdb_tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function asdb_tap($value, $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderTapProxy($value);
        }

        $callback($value);

        return $value;
    }
}

if (! function_exists('asdb_trait_uses_recursive')) {
    /**
     * Returns all traits used by a trait and its traits.
     *
     * @param  string  $trait
     * @return array
     */
    function asdb_trait_uses_recursive($trait)
    {
        $traits = class_uses($trait);

        foreach ($traits as $trait) {
            $traits += asdb_trait_uses_recursive($trait);
        }

        return $traits;
    }
}

if (! function_exists('asdb_with')) {
    /**
     * Return the given value, optionally passed through the given callback.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function asdb_with($value, callable $callback = null)
    {
        return is_null($callback) ? $value : $callback($value);
    }
}

if (! function_exists('asdb_collect')) {
	/**
	 * Create a collection from the given value.
	 *
	 * @param  mixed  $value
	 * @return \Prappo\WpEloquent\Support\Collection
	 */
	function asdb_collect($value = null)
	{
		return new Collection($value);
	}
}

if (! function_exists('asdb_data_get')) {
	/**
	 * Get an item from an array or object using "dot" notation.
	 *
	 * @param  mixed  $target
	 * @param  string|array|int|null  $key
	 * @param  mixed  $default
	 * @return mixed
	 */
	function asdb_data_get($target, $key, $default = null)
	{
		if (is_null($key)) {
			return $target;
		}

		$key = is_array($key) ? $key : explode('.', $key);

		foreach ($key as $i => $segment) {
			unset($key[$i]);

			if (is_null($segment)) {
				return $target;
			}

			if ($segment === '*') {
				if ($target instanceof Collection) {
					$target = $target->all();
				} elseif (! is_array($target)) {
					return asdb_value($default);
				}

				$result = [];

				foreach ($target as $item) {
					$result[] = asdb_data_get($item, $key);
				}

				return in_array('*', $key) ? Arr::collapse($result) : $result;
			}

			if (Arr::accessible($target) && Arr::exists($target, $segment)) {
				$target = $target[$segment];
			} elseif (is_object($target) && isset($target->{$segment})) {
				$target = $target->{$segment};
			} else {
				return asdb_value($default);
			}
		}

		return $target;
	}
}

if (! function_exists('asdb_data_set')) {
	/**
	 * Set an item on an array or object using dot notation.
	 *
	 * @param  mixed  $target
	 * @param  string|array  $key
	 * @param  mixed  $value
	 * @param  bool  $overwrite
	 * @return mixed
	 */
	function asdb_data_set(&$target, $key, $value, $overwrite = true)
	{
		$segments = is_array($key) ? $key : explode('.', $key);

		if (($segment = array_shift($segments)) === '*') {
			if (! Arr::accessible($target)) {
				$target = [];
			}

			if ($segments) {
				foreach ($target as &$inner) {
					asdb_data_set($inner, $segments, $value, $overwrite);
				}
			} elseif ($overwrite) {
				foreach ($target as &$inner) {
					$inner = $value;
				}
			}
		} elseif (Arr::accessible($target)) {
			if ($segments) {
				if (! Arr::exists($target, $segment)) {
					$target[$segment] = [];
				}

				asdb_data_set($target[$segment], $segments, $value, $overwrite);
			} elseif ($overwrite || ! Arr::exists($target, $segment)) {
				$target[$segment] = $value;
			}
		} elseif (is_object($target)) {
			if ($segments) {
				if (! isset($target->{$segment})) {
					$target->{$segment} = [];
				}

				asdb_data_set($target->{$segment}, $segments, $value, $overwrite);
			} elseif ($overwrite || ! isset($target->{$segment})) {
				$target->{$segment} = $value;
			}
		} else {
			$target = [];

			if ($segments) {
				asdb_data_set($target[$segment], $segments, $value, $overwrite);
			} elseif ($overwrite) {
				$target[$segment] = $value;
			}
		}

		return $target;
	}
}

if (! function_exists('asdb_head')) {
	/**
	 * Get the first element of an array. Useful for method chaining.
	 *
	 * @param  array  $array
	 * @return mixed
	 */
	function asdb_head($array)
	{
		return reset($array);
	}
}

if (! function_exists('asdb_last')) {
	/**
	 * Get the last element from an array.
	 *
	 * @param  array  $array
	 * @return mixed
	 */
	function asdb_last($array)
	{
		return end($array);
	}
}

if (! function_exists('asdb_value')) {
	/**
	 * Return the default value of the given value.
	 *
	 * @param  mixed  $value
	 * @return mixed
	 */
	function asdb_value($value)
	{
		return $value instanceof Closure ? $value() : $value;
	}
}
