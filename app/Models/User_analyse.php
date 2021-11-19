<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_analyse extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'categorie_id'
    ];


   
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }


    /**
     * Get the user that owns the User_analyse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }



}
