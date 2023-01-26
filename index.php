<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF$">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-oop-3</title>
</head>
<body>
    <?php
    class Persone{
        
      private  $nome;
      private  $cognome;
      private   $dataDiNascita;
      private   $luogoDiNascita;
      private  $codiceFiscale;

      public function __construct($nome,$cognome,$dataDiNascita,$luogoDiNascita,$codiceFiscale){

        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setDataDiNascita($dataDiNascita);
        $this->setLuogoDiNascita($luogoDiNascita);
        $this->setCodiceFiscale($codiceFiscale);
      }

      function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getCognome(){
        return $this->cognome;
    }
    function setCognome($cognome){
        $this->cognome = $cognome;
    }
    function getDataDiNascita(){
        return $this->dataDiNascita;
    }
    function setDataDiNascita($dataDiNascita){
        $this->dataDiNascita = $dataDiNascita;
    }
    function getLuogoDiNascita(){
        return $this->luogoDiNascita;
    }
    function setLuogoDiNascita($luogoDiNascita){
        $this->luogoDiNascita = $luogoDiNascita;
    }
    function getCodiceFiscale(){
        return $this->codiceFiscale;
    }
    function setCodiceFiscale($codiceFiscale){
        $this->codiceFiscale = $codiceFiscale;
    }
    function getPersone(){
        echo
       ' <div>'
       .'Nome:'.$this->getNome().
        'Cognome:'.$this->getCognome().
        'Data di Nascita'.$this->getDataDiNascita().
        'Luogo di Nascita'.$this->getLuogoDiNascita().
        'CF'.$this->getCodiceFiscale().
       '</div>'
    }
   
    }
    class Stipendio{
    private  $mensile;
    private  $tredicesima;
    private  $quattordicesima;

    public function __construct($mensile,$tredicesima,$quattordicesima){

        $this->setMensile($mensile);
        $this->setTredicesima($tredicesima);
        $this->setQuattordicesima($quattordicesima);
        
      }
      function getMensile(){
        return $this->mensile;
    }
    function setMensile($mensile){
        $this->mensile = $mensile;
    }
    function getTredicesima(){
        return $this->tredicesima;
    }
    function setTredicesima($tredicesima){
        $this->tredicesima = $tredicesima;
    }
    function getQuattordicesima(){
        return $this->quattordicesima;
    }
    function setQuattordicesima($quattordicesima){
        $this->quattordicesima = $quattordicesima;
    }
    function getStipendio(){
        echo'<div>'.'Stipendio Annuale:€'. ($this->getMensile()*12)+ $this->getTredicesima() + $this->getQuattordicesima().'</div>';
    }
    
    }
    $stipendio=new Stipendio(1500,750,750);

    class Impiegato extends Persone{

        private Stipendio $stipendio;
        private $dataDiAssunzione;

        public function __construct($nome,$cognome,$dataDiNascita,$luogoDiNascita,$codiceFiscale,$stipendio,$dataDiAssunzione){

            $this->setStipendio($stipendio);
            $this->setDataDiAssunzione($dataDiAssunzione);

            parent::__construct($nome,$cognome,$dataDiNascita,$luogoDiNascita,$codiceFiscale);

          
        }

        function getStipendio(){
            return $this->stipendio;
        }
        function setStipendio($stipendio){
            $this->stipendio = $stipendio;
        }
        function getDataDiAssunzione(){
            return $this->dataDiAssunzione;
        }
        function setDataDiAssunzione($dataDiAssunzione){
            $this->dataDiAssunzione = $dataDiAssunzione;
        }

        function getHtml(){
           echo '<div>'.$this->getPersone().$this->getStipendio().$this->getDataDiAssunzione().'</div>';
        }
       
    }


    $impiegato=new Impiegato('Mario','Rosi','17/10/1988','Roma','MRSSI17T101788501T',$stipendio,'22/05/2020');

     $impiegato->getHtml();
    
    

    

    ?>
</body>
</html>