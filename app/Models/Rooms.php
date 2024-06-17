<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $fillable = [
        'name', 'location', 'price', 'category', 'photo_path', '_method', // Add '_method' here
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Method to check if the user has left a review for the room
    public function hasReviewFromUser($userId)
    {
        return $this->reviews()->where('user_id', $userId)->exists();
    }
}
