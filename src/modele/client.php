<?php 

namespace factcli\modele;

class client extends \Illuminate\Database\Eloquent\Model{
	protected $table = 'client';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function client() {
		return $this->belongsTo("factcli\modele\client",
			"id");


	}
}


?>