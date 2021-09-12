<?php

namespace App\Models\Issues;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'issue_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the issue type that owns the status
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'issue_type_id');
    }

    /**
     * Get a collection of next possible statuses for the status
     */
    public function getNextPossibleStatusesAttribute()
    {
        $nextPossibleStatuses = collect();
        $workflows = $this->hasMany(Workflow::class, 'issue_status_id')->get();
        
        foreach ($workflows as $workflow) {
            $nextPossibleStatuses->push(Status::where('id', $workflow->next_possible_status)->first());
        }

        return $nextPossibleStatuses;
    }
}
