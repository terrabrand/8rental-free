<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Unit extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'units';

    protected $appends = [
        'cover_image',
        'unit_images',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unit_name',
        'property_id',
        'unit_section_id',
        'rent_price',
        'unit_size',
        'number_of_bedrooms',
        'number_of_kitchens',
        'number_of_bathrooms',
        'market_rent',
        'deposit_amount',
        'parking_type',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PARKING_TYPE_SELECT = [
        'Call for availability' => 'Call for availability',
        'Covered'               => 'Covered',
        'Dedicated Spot'        => 'Dedicated Spot',
        'Driveway'              => 'Driveway',
        'Garage'                => 'Garage',
        'On-street'             => 'On-street',
        'Private Lot'           => 'Private Lot',
        'Other'                 => 'Other',
        'None'                  => 'None',
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

    public function unitApplyingApplications()
    {
        return $this->hasMany(Application::class, 'unit_applying_id', 'id');
    }

    public function unitExpenses()
    {
        return $this->belongsToMany(Expense::class);
    }

    public function unitDocuments()
    {
        return $this->belongsToMany(Document::class);
    }

    public function unitInvoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function unit_section()
    {
        return $this->belongsTo(Section::class, 'unit_section_id');
    }

    public function getCoverImageAttribute()
    {
        $file = $this->getMedia('cover_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getUnitImagesAttribute()
    {
        $files = $this->getMedia('unit_images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
