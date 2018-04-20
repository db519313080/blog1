<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = true;
    protected $dateFormat = 'Y-m-d H:i:s';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
