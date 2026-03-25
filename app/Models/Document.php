<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titre',
        'reference',
        'description',
        'fichier',
        'type',
        'date_document',
        'categorie_id',
        'user_id',
        'service_id',
        'statut',
        'niveau_confidentialite',
        'qr_code',
        'ocr_text',
        'nombre_pages',
        'taille_fichier',
    ];

    protected $casts = [
        'date_document' => 'date',
        'ocr_text' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function versions()
    {
        return $this->hasMany(DocumentVersion::class);
    }

    public function partages()
    {
        return $this->hasMany(DocumentPartage::class);
    }

    public function archive()
    {
        return $this->hasOne(Archive::class);
    }

    public function impressions()
    {
        return $this->hasMany(Impression::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'document_tag');
    }
}
