<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anime;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id',
        'content',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
