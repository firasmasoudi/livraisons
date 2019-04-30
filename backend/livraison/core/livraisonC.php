<?PHP
include "../config.php";

class LivraisonC {
function afficherLivraison ($livraison){
		echo "Id: ".$livraison->getId()."<br>";
		echo "Libelle: ".$livraison->getLibelle()."<br>";
		echo "delay: ".$livraison->getDelay()."<br>";
		echo "Id livreur : ".$livraison->getId_liv()."<br>";

	}

	
	function ajouterLivraison($livraison){
		$sql="insert into livraison (id,libelle,delay,id_liv) values (:id,:libelle, :delay,:id_liv)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$id=$livraison->getId();
        $libelle=$livraison->getLibelle();
        $delay=$livraison->getDelay();
        $id_liv=$livraison->getId_liv();

        $req->bindValue(':id',$id);
		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':delay',$delay);
		$req->bindValue(':id_liv',$id_liv);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivraisons(){
		$sortBy=(isset($_POST['sortBy'])? $_POST['sortBy'] :NULL);
		$sql="SElECT * From livraison";
		if($sortBy !=NULL)
		{
			$sql.=" ORDER BY ".$sortBy;
		}
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivraison($id){
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierLivraison($livraison,$id){
		$sql="UPDATE livraison SET libelle=:libelle,id_liv=:id_liv,delay=:delay WHERE id=$id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

        $libelle=$livraison->getLibelle();
        $id_liv=$livraison->getId_liv();
        $delay=$livraison->getDelay();



		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':id_liv',$id_liv);
		$req->bindValue(':delay',$delay);

		
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
		
	}
	
	function recupererLivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$res=$db->query($sql);
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	/*function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>