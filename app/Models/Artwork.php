<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'title',
        'slug',
        'description',
        'technique',
        'dimensions',
        'year',
        'price',
        'image',
        'status',
    ];

    /**
     * Une œuvre appartient à un artiste.
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Une œuvre peut avoir plusieurs demandes de contact.
     */
    public function contactRequests()
    {
        return $this->hasMany(ContactRequest::class);
    }
}
