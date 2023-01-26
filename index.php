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
            return

                'Nome:' . $this->getNome() .'<br>'.
                'Cognome:' . $this->getCognome() .'<br>'.
                'Data di Nascita:' . $this->getDataDiNascita() .'<br>'.
                'Luogo di Nascita:' . $this->getLuogoDiNascita() .'<br>'.
                'CF' . $this->getCodiceFiscale();
       
    }
   
    }
    class Stipendio{
    private  $mensile;
    private  $tredicesima = false;
    private  $quattordicesima = false;

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
    function getAnnuale(){
        $importoTredicesima = 0;
        $importoQuattordicesima = 0;

        if($this->getTredicesima()==true){
            $importoTredicesima = $this->getMensile();
        }
        if($this->getQuattordicesima()==true){
            $importoQuattordicesima = $this->getMensile();
        }
        
        return ($this->getMensile()*12)+ $importoTredicesima + $importoQuattordicesima;
    }
       
    }
   
   

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

        function getRedditoAnnuale() {
            return $this->getStipendio()->getAnnuale();
        }

        function getHtml(){
           echo '<div>'.'<h4>Impiegato</h4>'. $this->getPersone().'<br>'.
           'Stipendio Annuale:€
           '.$this->getStipendio()->getAnnuale().'<br>'
           .'Data di Assunzione:'
           .$this->getDataDiAssunzione().'</div>';
        }
       
    }

    $stipendio=new Stipendio(400,true,false);
    $impiegato=new Impiegato('Mario','Rossi','17/07/18','Roma','MRSSI1788501T',$stipendio,'18/05/2018');
    
   
     $impiegato->getHtml();

    
   
    class Capo extends Persone{
         
        private $dividendo ;
        private $bonus ;
       
        
        public function __construct($nome,$cognome,$dataDiNascita,$luogoDiNascita,$codiceFiscale,$bonus,$dividendo){
            $this->setDividendo($dividendo);
            $this->setBonus($bonus);
            parent::__construct($nome,$cognome,$dataDiNascita,$luogoDiNascita,$codiceFiscale);

         
    }
    
    function getDividendo(){
        return $this->dividendo;
    }
    function setDividendo($dividendo){
        $this->dividendo = $dividendo;
    }
    function getBonus(){
        return $this->bonus;
    }
    function setBonus($bonus){
        $this->bonus = $bonus;
    }

    function getRedditoAnnuale(){
            return ($this->getDividendo() * 12) + $this->getBonus();
    }

    function getHtmlBoss(){
        echo '<div>'.'<h4>Boss</h4>'. $this->getPersone().'<br>'.
        'Reddito Annuale:€
        '.$this->getRedditoAnnuale().'<br>'
        .'</div>';
    }
    
    
}

    $boss = new Capo('Darth', 'Sidius',' 18 / 24 / 89', 'Mordor', 'sfasgfvdafdsfvdafvsvffsfas', 600000, 38000);
    $reddito = $stipendio;
    echo $boss->getHtmlBoss();

    

    ?>
</body>
</html>