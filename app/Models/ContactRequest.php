<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'phone',
        'message',
        'artwork_id',
        'status',
    ];

    /**
     * Une demande de contact peut être liée à une œuvre.
     */
    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}
