<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'book';
    protected $keyType = 'integer';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    protected $fillable = [
        'book_name',
        'author_id',
        'book_publisher',
        'publish_year',
        'book_synopsis'
        ];
}
