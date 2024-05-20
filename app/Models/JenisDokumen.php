<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class JenisDokumen extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $fillable = ['nama_jenis','is_active'];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable('*')->useLogName('system');
        // Chain fluent methods for configuration options
    }


}
