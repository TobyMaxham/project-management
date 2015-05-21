<?php namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Navigation
 *
 * @author tmaxham
 * @generated 05.05.2015
 * @version 05.05.2015
 */
class Navigation extends Model {

	protected $fillable = ['name', 'description', 'path', 'parent', 'icon',
		'external', 'active'];

	public static function navi()
	{
		return self::where('parent', 0)->where('active', 1)
			->with('navigations')
			->get();
	}

	public function navigations()
	{
		return $this->hasMany('App\Navigation', 'parent');
	}

} 