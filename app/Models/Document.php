<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'documents';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function document_types()
    {
        return $this->belongsToMany(DocumentType::class);
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class);
    }

    public function landlords()
    {
        return $this->belongsToMany(Landlord::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function uploadDocument($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('documents', $fileName); // Assuming you have a 'documents' directory in your storage
        $this->file_path = $fileName;
        $this->save();
    }
}
