<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'date_archivage',
        'raison',
    ];

    protected $casts = [
        'date_archivage' => 'date',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
