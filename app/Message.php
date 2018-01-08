<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['name', 'email', 'text'];


  public function user()
  {

    return $this->belongsTo(User::class);
    
  }


  public function note()
  {

    $this->morphOne(Note::class, 'notable');

  }

  public function tags()
  {
    
    return $this->morphToMany(Tag::class, 'taggable');

  }

}
