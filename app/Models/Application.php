<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'applications';

    protected $dates = [
        'date_of_intended_start',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'property_applying_id',
        'unit_applying_id',
        'tenant_id',
        'date_of_intended_start',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function property_applying()
    {
        return $this->belongsTo(Property::class, 'property_applying_id');
    }

    public function unit_applying()
    {
        return $this->belongsTo(Unit::class, 'unit_applying_id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function getDateOfIntendedStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfIntendedStartAttribute($value)
    {
        $this->attributes['date_of_intended_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
