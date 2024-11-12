<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Minute extends Model
{
    use HasFactory, SoftDeletes;
    use Searchable;

    protected $fillable = ['id','title','content','active','article_created_at','user_id'];
    protected $casts = [];
    protected $table = 'minutes';

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'search';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
