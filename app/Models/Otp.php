<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = "otp";
    protected $primaryKey = "otp_id";
    protected $fillable = [
        'otp_id',
        'otp_email',
        'otp_code',
        'otp_is_actie',
        'otp_expiry_date',
    ];
}
