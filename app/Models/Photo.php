<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;


  protected $guarded =[];
    protected $profile = '/users_profile_pic/';

    protected $placeholder = 'https://placehold.co/600x400';
  


   /*   public function getFileAttribute($photo)

    {

        return $this->profile. $photo;
    }  */

 
  public function getFileAttribute($photo)
  {
      if ($photo) 
      {
          $profilePic = public_path($this->profile . $photo);
          if (file_exists($profilePic)) 
          {
              return url($this->profile . $photo);
          }
      }
      
      return url($this->placeholder);
  }
  


    

/* public function getFileAttribute($photo)
{
    $profilePic = public_path($this->profile . $photo);

    if (file_exists($profilePic)) {
        return url($this->profile . $photo);
    } else {
        // Update the database to remove the photo
        
       // $this->update(['file' => null]);
       //$this->update(['photo_id' => null]);
      // $this->delete('file');
      $this->update(['photo_id' => null]);
        return url($this->placeholder);
    }
} */


    
     public function user()

    {

      return $this->belongsTo(User::class);
    } 

}
