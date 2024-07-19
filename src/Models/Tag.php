<?php

namespace EscolaLms\Tags\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Tag
 * @package EscolaLms\Tags\Models
 *
 * @property string $title
 * @property string $morphable_type
 * @property integer $morphable_id
 */

class Tag extends Model
{
    use HasFactory;
    public $table = 'tags';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'title',
        'morphable_type',
        'morphable_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'morphable_type' => 'string',
        'morphable_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array<string, string>
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'morphable_type' => 'required|string|max:255',
        'morphable_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


    /**
     * Get the owning commentable model.
     */
    public function morphable(): MorphTo
    {
        return $this->morphTo();
    }
}
