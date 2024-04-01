<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'invoices';

    public static $searchable = [
        'name',
        'invoice_number',
        'date',
        'date_due',
        'status',
    ];

    protected $dates = [
        'date',
        'date_due',
        'date_paid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Paid'    => 'Paid',
        'Pending' => 'Pending',
        'Overdue' => 'Overdue',
        'Partial' => 'Partial',
    ];

    protected $fillable = [
        'name',
        'invoice_number',
        'date',
        'date_due',
        'partial_amount',
        'amount',
        'tax',
        'status',
        'date_paid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class);
    }

    public function landlords()
    {
        return $this->belongsToMany(Landlord::class);
    }

    public function invoice_types()
    {
        return $this->belongsToMany(InvoiceType::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateDueAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateDueAttribute($value)
    {
        $this->attributes['date_due'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDatePaidAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePaidAttribute($value)
    {
        $this->attributes['date_paid'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPercentagePaidAttribute()
    {
        if ($this->amount == 0) {
        return 0;
        }

        return round(($this->partial_amount / $this->amount) * 100, 2);
    }

    public function updateStatusIfNeeded()
    {
        if ($this->status === 'Partial' && $this->date_due < now()) {
         $this->status = 'Overdue';
            $this->save();
        }
    }
}
