<?PHP
class livraison{
	private $id;
	private $libelle;
	private $id_liv;
	private $delay;

	function __construct($id,$libelle,$id_liv,$delay){
		$this->id=$id;
		$this->libelle=$libelle;
		$this->id_liv=$id_liv;
		$this->delay=$delay;

	}
	
	function getId(){
		return $this->id;
	}
	function getLibelle(){
		return $this->libelle;
	}
	function getId_liv(){
		return $this->id_liv;
	}
	function getDelay(){
		return $this->delay;
	}
	function setId($id){
		$this->id=$id;
	}
	
	
	function setLibelle($libelle){
		$this->libelle=$libelle;
	}
	function setId_liv($id_liv){
		$this->id_liv;
	}
	function setDelay($delay){
		$this->delay=$delay;
	}

	
}

?>