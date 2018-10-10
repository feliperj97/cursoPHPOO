<?php
    class Conta{
        public $numconta;
        protected $tipo; // CC - Corrente e CP - Poupança
        private $dono;
        private $saldo;
        private $status;

        function __construct(){
            $this->setSaldo(0);
            $this->setStatus(false);
            echo "<p>Criado com sucesso</p>";
        }
        
        public function getNumconta()
        {
                return $this->numconta;
        }

       
        public function setNumconta($numconta)
        {
                $this->numconta = $numconta;

                return $this;
        }

        public function getTipo()
        {
                return $this->tipo;
        }

        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        public function getDono()
        {
                return $this->dono;
        }

        public function setDono($dono)
        {
                $this->dono = $dono;

                return $this;
        }

        public function getSaldo()
        {
                return $this->saldo;
        }

        
        public function setSaldo($saldo)
        {
                $this->saldo = $saldo;

                return $this;
        }

        
        public function getStatus()
        {
                return $this->status;
        }

       
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        public function abrirConta($t){
            $this->setTipo($t);
            $this->setStatus(true);
            if($t == "CC"){
                $this->setSaldo(50.00); //para conta corrente o cliente começa com 50 reais
            }

            else{
                $this->setSaldo(150.00); //para conta poupança o cliente começa com 150 reais
            }
        }

        public function fecharConta(){
            if($this->getSaldo() > 0){
                echo "Não é possível fechar a conta pois o saldo está positivo. Saque o dinheiro de pois feche";
            }
            elseif ($this->getSaldo() < 0) {
                echo "Não é possível fechar a conta pois está com débito. Pague e depois feche.";
            }

            else {
                $this->setStatus(false);
                echo "Conta fechada com sucesso";
            }

        }

        public function depositar($v){
            if($this->getStatus()){
                $this->setSaldo($this->getSaldo() + $v);
                echo "<p>Depósito de " . $v . " na conta de " . $this->getDono() . "</p>";
            }

            else{
                echo "Não é possível depositar, a conta está fechada";
            }
        }

        public function sacar($v){
            if($this->getStatus()){
                if($this->getSaldo() < $v){
                    echo "Não há saldo suficiente para este saque";
                }

                else{
                    $this->setSaldo($this->getSaldo() - $v);
                    echo "<p>Saque de " . $v . " na conta de " . $this->getDono() . "</p>";
                }

            }

            else {
                echo "Esta conta está inativa";
            }
        }

        public function pagarMensal(){
         if($this->getStatus()){
                if($this->getTipo() == "CC"){
                    $v = 12;
                }

                else{
                    $v = 20;
                }

                if($this->getSaldo() >= $v){
                    $this->setSaldo($this->getSaldo() - $v);
                    echo "<p>Mensalidade de " . $v . " debitada na conta de " . $this->getDono() . "</p>";
                }

                else{
                    echo "Saldo insuficiente";
                }
            }
        }  
        
    }
    
?>