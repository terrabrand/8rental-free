<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'sections';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'section_name',
        'property_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function unitSectionUnits()
    {
        return $this->hasMany(Unit::class, 'unit_section_id', 'id');
    }

    public function sectionAssignedMaintainers()
    {
        return $this->hasMany(Maintainer::class, 'section_assigned_id', 'id');
    }

    public function sectionTenants()
    {
        return $this->hasMany(Tenant::class, 'section_id', 'id');
    }

    public function sectionInvoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
