<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory, SoftDeletes;

// https://laravel.com/docs/8.x/eloquent-mutators#date-casting
    protected $dates = ['due_date'];
//https://laravel.com/docs/8.x/eloquent-serialization#appending-values-to-json
    protected $appends = ['is_past', 'is_urgent'];
    private const DATE_FOR_URGENT = 3;
/*----------------------------------------------------------------------------*/
    public function isPast(): bool
    {
        // endOfDay(): https://carbon.nesbot.com/docs/#api-modifiers
        // isPast(): https://carbon.nesbot.com/docs/#api-comparison
        return $this->due_date->endOfDay()->isPast();
    }

    public function isUrgent(): bool
    {
        // today(): https://carbon.nesbot.com/docs/#api-instantiation
        // startOfDay(): https://carbon.nesbot.com/docs/#api-modifiers
        $today = Carbon::today()->startOfDay();

        // addDays(): https://carbon.nesbot.com/docs/#api-addsub
        $three_days_from_today = $today->copy()->addDays(self::DATE_FOR_URGENT)
            ->endOfDay();

        // lessThanOrEqualTo(): https://carbon.nesbot.com/docs/#api-comparison
        return !$this->isPast() &&
            $this->due_date->lessThanOrEqualTo($three_days_from_today);
    }

    // https://laravel.com/docs/8.x/eloquent-mutators#defining-an-accessor
    public function getIsPastAttribute(): bool
    {
        return $this->isPast();
    }

    // https://laravel.com/docs/8.x/eloquent-mutators#defining-an-accessor
    public function getIsUrgentAttribute(): bool
    {
        return $this->isUrgent();
    }

    // https://laravel.com/docs/8.x/eloquent#local-scopes
    public function scopePast($query)
    {
        $today = Carbon::today()->format('Y-m-d');
        return $query->where('due_date', '<', $today);
    }

    // https://laravel.com/docs/8.x/eloquent#local-scopes
    public function scopeFuture($query)
    {
        $today = Carbon::today()->format('Y-m-d');
        return $query->where('due_date', '>=', $today);
    }
}
