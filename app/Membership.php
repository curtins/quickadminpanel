<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Membership
 *
 * @package App
 * @property integer $gvr_number
*/
class Membership extends Model
{
    protected $fillable = ['gvr_number'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setGvrNumberAttribute($input)
    {
        $this->attributes['gvr_number'] = $input ? $input : null;
    }
    
}
