<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
	use Sluggable;
	use SluggableScopeHelpers;

    protected $fillable = [
    	'user_id',
		'title',
		'body',
		'slug',
		'updated_at'
	];

    public function user() {
		return $this->belongsTo('App\User');
	}

	public function comments() {
    	return $this->hasMany('App\Comment');
	}

	public function tags() {
		return $this->belongsToMany('App\Tag');
	}

	public function sluggable() {
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}
}
