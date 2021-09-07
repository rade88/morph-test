<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

	/**
	 * @var string[]
	 */
    protected $fillable = [
		'title',
		'description',
		'image_url',
		'user_id',
	];

    protected $hidden = [
    	'user_id',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
