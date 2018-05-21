<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fadion\Bouncy\BouncyTrait;

class Status extends Model
{
    use BouncyTrait;
    protected $indexName = 'name';
    protected $typeName = 'cool_type';

    protected $table = 'statuses';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = true;
    protected $dateFormat = 'Y-m-d H:i:s';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indexAllStatus()
    {
        return self::all()->index();
    }
}
