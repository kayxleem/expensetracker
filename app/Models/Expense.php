<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeFrom(Builder $query, $date): Builder
    {
        return $query->where('date', '<=', Carbon::parse($date));
    }

    public function scopeTo(Builder $query, $date): Builder
    {
        return $query->where('date', '>=', Carbon::parse($date));
    }

    public function scopeMin(Builder $query, $total): Builder
    {
        return $query->where('total', '>=', $total);
    }

    public function scopeMax(Builder $query, $total): Builder
    {
        return $query->where('total', '<=', $total);
    }
}
