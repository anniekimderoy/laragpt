<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'reponse',
    ];

    /**
     * Retourne le mot clé associé au message
     *
     * @return BelongsTo
     */
    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }

    /**
     * Retourne l'usager associé au message
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
