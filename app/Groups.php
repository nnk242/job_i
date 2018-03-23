<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Groups extends Model
{
    protected $table = 'groups';
    public function Image() {
        return $this->hasMany(Images::class, 'group_id', 'id');
    }
}