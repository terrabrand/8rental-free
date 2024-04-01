<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'properties';

    protected $appends = [
        'main_image',
        'more_images',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'property_name',
        'landlord_id',
        'property_type',
        'location',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PROPERTY_TYPE_SELECT = [
        'Residential'   => 'Residential',
        'Commercial'    => 'Commercial',
        'CondoTownhome' => 'Condo/Townhome',
        'Multi-Family'  => 'Multi-Family',
        'Single-Family' => 'Single-Family',
        'stores'        => 'stores',
        'office'        => 'office',
        'shops'         => 'shops',
        'other'         => 'other',
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

    public function propertyTenants()
    {
        return $this->hasMany(Tenant::class, 'property_id', 'id');
    }

    public function propertyApplyingApplications()
    {
        return $this->hasMany(Application::class, 'property_applying_id', 'id');
    }

    public function propertyUnits()
    {
        return $this->hasMany(Unit::class, 'property_id', 'id');
    }

    public function propertySections()
    {
        return $this->hasMany(Section::class, 'property_id', 'id');
    }

    public function propertyAssignedMaintainers()
    {
        return $this->belongsToMany(Maintainer::class);
    }

    public function propertyExpenses()
    {
        return $this->belongsToMany(Expense::class);
    }

    public function propertyDocuments()
    {
        return $this->belongsToMany(Document::class);
    }

    public function propertyInvoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id');
    }

    public function getMainImageAttribute()
    {
        return $this->getMedia('main_image')->last();
    }

    public function getMoreImagesAttribute()
    {
        $files = $this->getMedia('more_images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
