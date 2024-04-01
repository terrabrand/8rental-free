<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tenant extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'tenants';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GENDER_SELECT = [
        'Male'           => 'Male',
        'Female'         => 'Female',
        'Rather not say' => 'Rather Not Say',
    ];

    public const STATUS_SELECT = [
        'applicant'       => 'Applicant',
        'previous tenant' => 'Previous Tenant',
        'tenant'          => 'Tenant',
    ];

    public const MARITAL_STATUS_SELECT = [
        'Single'   => 'Single',
        'Married'  => 'Married',
        'Widowed'  => 'Widowed',
        'Divorced' => 'Divorced',
    ];

    public const ID_TYPE_SELECT = [
        'national ID'      => 'national ID',
        'Driving License'  => 'Driving License',
        'Health Insurance' => 'Health Insurance',
        'Other'            => 'Other',
    ];

    protected $fillable = [
        'property_id',
        'section_id',
        'unit_id',
        'first_name',
        'id_type',
        'id_number',
        'status',
        'monthly_gross_income',
        'additional_income',
        'date_of_birth',
        'gender',
        'marital_status',
        'ethnicity',
        'country',
        'city',
        'state',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ETHNICITY_SELECT = [
        'American Indian or Alaska Native'          => 'American Indian or Alaska Native',
        'Asian'                                     => 'Asian',
        'Black or African American'                 => 'Black or African American',
        'Hispanic or Latino'                        => 'Hispanic or Latino',
        'Native Hawaiian or Other Pacific Islander' => 'Native Hawaiian or Other Pacific Islander',
        'White / European'                          => 'White / European',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function tenantApplications()
    {
        return $this->hasMany(Application::class, 'tenant_id', 'id');
    }

    public function tenantExpenses()
    {
        return $this->belongsToMany(Expense::class);
    }

    public function tenantDocuments()
    {
        return $this->belongsToMany(Document::class);
    }

    public function tenantInvoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
