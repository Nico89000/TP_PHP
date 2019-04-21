<?php 


namespace factcli\modele;

class facture extends \Illuminate\Database\Eloquent\Model{
	protected $table = 'facture';
	protected $primaryKey = 'id';
	public $timestamps = false;




	public function facture() {
		return $this->hasMany("factcli\modele\facture","id");

	}
}


?>