<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentPartage extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'user_id',
        'permission',
    ];

    protected $casts = [
        'permission' => 'string',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
