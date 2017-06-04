<?php
class CSV {
 
private $csv = Null;
	/**
	 * Cette ligne permet de créer les colonnes du fichers Excel
	 * Cette fonction est totalement faculative, on peut faire la même chose avec la
	 * fonction insertion
	 */
	function Colonne($file) {
 
		$this->csv.=$file."\n";
		return $this->csv;
 
	}
 
	/**
	 * Insertion des lignes dans le fichiers Excel, il faut introduire les données sous formes de chaines
	 * de caractère.
	
	 */
	function Insertion($file){
  if ($file === null ){
			throw new Exception("Error:Invalid data Insertion!");
			}
		$this->csv.=$file."\n";
		return $this->csv;
	}
 
	/**
	 * fonction de sortie du fichier avec un nom spécifique.
	 *
	 */
	function output($NomFichier){
 
		header("Content-type: application/vnd.ms-excel");
		header("Content-disposition: attachment; filename=$NomFichier.csv");
		print $this->csv;
		exit;
 
	}
}

?>
