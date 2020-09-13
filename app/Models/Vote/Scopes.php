<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-08
 * Time: 13:40
 */

namespace App\Models\Vote;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

trait Scopes
{
    /**
     * @param Builder $query
     * @param string $value
     * @param string $morphAlias
     * @param string|null $column
     */
    public function scopeWhereIdentifier(Builder $query, string $value, string $morphAlias, string $column = null)
    {
        $query->whereHas('identifier', function ($query) use ($value, $morphAlias, $column) {
            $query->where('identifierable_type', $morphAlias);
            $class = Relation::getMorphedModel($morphAlias);
            $query->whereHasMorph('identifierable', [$class], function ($query) use ($value, $morphAlias, $column) {
                $column = $column ?? $morphAlias;
                $query->where($column, $value);
            });
        });
    }
}
