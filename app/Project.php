<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Project
 * @package App
 *
 * @author tmaxham
 * @generated 06.05.2015
 * @version 06.05.2015
 */

class Project extends Model {

	public function getStateAttribute()
	{
		//default, primary, success, info, warning, danger, green, yellow, red

		switch($this->status)
		{
			case 90: return 'red';
			case 10: return 'green';
			case 50: return 'yellow';
			default: return 'default';
		}

	}

	public function users()
	{
		return $this->belongsToMany('App\User')->withPivot('position');
	}

	public function owns()
	{
		return $this->belongsTo('App\User', 'owner');
	}

	public function credentials()
	{
		return $this->hasMany('App\Credential', 'target');
	}

} 