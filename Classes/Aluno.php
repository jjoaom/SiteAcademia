<?php
        require_once 'Conexao.php';
    class Aluno{
        private $matricula;
        private $nome;
        private $endereco;
        private $cep;
        private $bairro;
        private $cidade;
        private $uf;
        private $celular;
        private $email;
        private $nascimento;
        private $idade;
        private $peso;
        private $altura;
        private $sexo;
        private $imc;
        private $resultado;

        public function __construct($nome='', $endereco='', $cep='', $bairro='', $cidade='', $uf='', $celular='', $email='', $nascimento='', $idade='', $peso='', $altura='', $sexo='')
        {
            $this->nome = $nome;
            $this->endereco = $endereco;
            $this->cep = $cep;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->uf = $uf;
            $this->celular = $celular;
            $this->email = $email;
            $this->nascimento = $nascimento;
            $this->idade = $idade;
            $this->peso = $peso;
            $this->altura = $altura;
            $this->sexo = $sexo;
                if($altura != ''){
                  $this->setImc();
                  $this->setResultado();
                }

        }

        
        private function setImc(){
            $this->imc = $this->peso / ($this->altura * $this->altura);
        }
        public function getImc(){
            return $this->imc;
        }
        private function setResultado(){
            if($this->imc >= 40){
                $this->resultado = 'Obesidade grau 3 ';
            }else if($this->imc >= 35){
                $this->resultado = 'Obesidade grau 2';
            }else if($this->imc >= 30){
                $this->resultado = 'Obesidade grau 1';
            }else if($this->imc >= 25){
                $this->resultado = 'Sobre Peso';
            }else if($this->imc >= 18.5){
                $this->resultado = 'Peso normal';
            }else{
                $this->resultado = 'Abaixo do peso ideal';
            }
        }
        public function getResultado(){
            return $this->resultado;
        }


        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;
        }

        
        public function getEndereco()
        {
                return $this->endereco;
        }
        public function setEndereco($endereco)
        {
                $this->endereco = $endereco;
        }


        public function getCep()
        {
                return $this->cep;
        }
        public function setCep($cep)
        {
                $this->cep = $cep;

        }


        public function getBairro()
        {
                return $this->bairro;
        }
        public function setBairro($bairro)
        {
                $this->bairro = $bairro;
        }



        public function getCidade()
        {
                return $this->cidade;
        }
        public function setCidade($cidade)
        {
                $this->cidade = $cidade;

        }


        public function getUf()
        {
                return $this->uf;
        }
        public function setUf($uf)
        {
                $this->uf = $uf;
        }


        public function getCelular()
        {
                return $this->celular;
        }
        public function setCelular($celular)
        {
                $this->celular = $celular;
        }


        public function getEmail()
        {
                return $this->email;
        }
        public function setEmail($email)
        {
                $this->email = $email;
        }


        public function getNascimento()
        {
                return $this->nascimento;
        }
        public function setNascimento($nascimento)
        {
                $this->nascimento = $nascimento;

                return $this;
        }

        
        public function getIdade()
        {
                return $this->idade;
        }
        public function setIdade($idade)
        {
                $this->idade = $idade;

        }


        public function getPeso()
        {
                return $this->peso;
        }

        public function setPeso($peso)
        {
                $this->peso = $peso;
        }
        


        public function getAltura()
        {
                return $this->altura;
        }

        public function setAltura($altura)
        {
                $this->altura = $altura;

        }


        public function getSexo()
        {
                return $this->sexo;
        }

        public function setSexo($sexo)
        {
                $this->sexo = $sexo;
        }
        /*GET'S E SET'S*/  
        
        public function inserir($nome, $endereco, $cep, $bairro, $cidade, $uf, $celular, $email, $nascimento, $idade, $peso, $altura, $sexo, $imc, $resultado){
            
            $conn = Conexao::getConexao();

            $sql = "INSERT INTO aluno(nome, endereco, cep, bairro, cidade, uf, celular, email, nascimento, idade, peso, altura, sexo, imc, resultado) 
            VALUES(
                '{$nome}',
                '{$endereco}',
                '{$cep}',
                '{$bairro}',
                '{$cidade}',
                '{$uf}',
                '{$celular}',
                '{$email}',
                '{$nascimento}',
                '{$idade}',
                '{$peso}',
                '{$altura}',
                '{$sexo}',
                '{$imc}',
                '{$resultado}'
            )";

            $conn->exec($sql);
            Conexao::fecharConexao();
        }

        public function pesquisarMatricula($matricula){
                $conn = Conexao::getConexao();
                $sql = "SELECT * FROM aluno WHERE matricula = $matricula";
                $result = $conn->query($sql);
                Conexao::fecharConexao();

                return $result;
        }

        public function pesquisarNome($nome){
                $conn = Conexao::getConexao();
                $sql = "SELECT * FROM aluno WHERE nome = '$nome'";
                $result = $conn->query($sql);
                Conexao::fecharConexao();

                return $result;
        }
    }
?>