<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'body', 'iframe', 'image', 'user_id'
    ];
	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */

	// method to slugs
	public function sluggable()
	{
	    return [
	        'slug' => [
	            'source' => 'title',
	            'upUpdate' => true
	        ]
	    ];
	}

	// relation to user
	public function user(){
        return $this->belongsTo(User::class);
    }

    // attribute to get excerpt 
    public function getGetExcerptAttribute(){
        return substr($this->body, 0, 140);
        // return $this->body; 
        // return Str::limit($this->body,140);
    }

    // attribute to get image
    public function getGetImageAttribute(){
        
    	if ($this->image) {
    		// return \Storage::disk('public')->url($this->image);
    		return url("storage/$this->image");
    	}
    }
}
