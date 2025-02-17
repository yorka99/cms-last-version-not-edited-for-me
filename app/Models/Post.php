<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Cviebrock\EloquentSluggable\Sluggable;



class Post extends Model 

{
    use HasFactory;
    use Sluggable;
 



    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'      => 'title',
                'onUpdate'    => true,
            ],
           
        ];
    }



   /*  protected $fillable = [
        'title',
        'post_image',
        'body',
    ]; */

    protected $guarded=[];


    public function user()
    {
     return $this->belongsTo(User::class);

    }


    public function category()
    {
     return $this->belongsTo(Category::class);

    }


    public function comments()
    {
     return $this->hasMany(Comment::class);

    }
    /*   public function setPostImageAttribute($value)
    {

        $this->attributes['post_image'] = asset($value);
    
    } */

    /* public function getPostImageAttribute()
    { */
     /*  if(substr($value,0,2) == 'ht')
	            return $value;
        else                       
       return asset('/storage/'.$value); */ 
        
       //dd(asset($value));
    

       
       public function getPostImageAttribute($value)
       {
           if ($value) 
           {
               if (substr($value, 0, 4) == 'http') 
               {
                   return $value; // Return the image URL as it is
               } 
               else 
               {
                   return asset('/storage/' . $value); // Return the image URL with storage path
               }
           } 
           else
            {
               return 'https://placehold.co/600x400'; // Return placeholder image URL for null values
            }
       }

    


    
    public function getRouteKeyName ()
    {
        return 'slug';
    }

 /*    public function photo()
    {
     return $this->belongsTo(Photo::class);

    } */

    

    
  
}
