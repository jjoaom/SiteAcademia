<?php

    if (empty($_POST)){

        $nome = '';
        $endereco = '';
        $cep = '';
        $bairro = '';
        $cidade = '';
        $uf = '';
        $celular = '';
        $email = '';
        $nascimento = '';
        $idade = '';
        $peso = '';
        $altura = '';
        $sexo = '';

        formulario($nome, $endereco, $cep, $bairro, $cidade, $uf, $celular, $email, $nascimento, $idade, $peso, $altura, $sexo);

    }else {
        echo 'Cadastro Inserido com sucesso';
        $dados = $_POST;
        $opcao = $dados['btn'];

        if ($opcao == 'salvar') {
            $nome= $dados['txtNome']; 
            $endereco= $dados['txtEndereco'];
            $cep= $dados['txtCep'];
            $bairro= $dados['txtBairro']; 
            $cidade= $dados['txtCidade']; 
            $uf= $dados['txtUf'];
            $celular= $dados['txtCelular']; 
            $email= $dados['txtEmail']; 
            $nascimento= $dados['txtNascimento'];
            $idade= $dados['txtIdade']; 
            $peso= $dados['txtPeso']; 
            $altura= $dados['txtAltura'];
            $sexo= $dados['txtSexo'];

            //instanciando um objeto de tipo aluno
            require_once 'Classes/Aluno.php';
            $aluno = new Aluno($nome, $endereco, $cep, $bairro, $cidade, $uf, $celular, $email, $nascimento, $idade, $peso, $altura, $sexo);
            
            
            $aluno->inserir(
            $aluno->getNome(), 
            $aluno->getEndereco(), 
            $aluno->getCep(), 
            $aluno->getBairro(), 
            $aluno->getCidade(), 
            $aluno->getUf(), 
            $aluno->getCelular(), 
            $aluno->getEmail(), 
            $aluno->getNascimento(), 
            $aluno->getIdade(), 
            $aluno->getPeso(), 
            $aluno->getAltura(), 
            $aluno->getSexo(), 
            $aluno->getImc(), 
            $aluno->getResultado());
        
        }

        if ($opcao == 'pesquisarMatricula'){
            $matricula = $dados['txtPesquisarMatricula'];
    
            require_once 'Classes/Aluno.php';
            $aluno = new Aluno();
            $result = $aluno->pesquisarMatricula($matricula);

            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                relatorio($row);
            }else {
                echo 'Não retonou nenhum resultado';
            }
        }

        if ($opcao == 'pesquisarNome'){
            $nome = $dados['txtPesquisarNome'];

            require_once 'Classes/Aluno.php';
            $aluno = new Aluno();
            $result = $aluno->pesquisarNome($nome);

            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                relatorio($row);
            }else {
                echo 'Não retornou nenhum resultado';
            }
        }
    }

    function formulario($nome, $endereco, $cep, $bairro, $cidade, $uf, $celular, $email, $nascimento, $idade, $peso,$altura, $sexo) {
        $formulario = file_get_contents('html/form.html');
        $formulario = str_replace('{nome}', $nome, $formulario);
        $formulario = str_replace('{endereco}', $endereco, $formulario);
        $formulario = str_replace('{cep}', $cep, $formulario);
        $formulario = str_replace('{bairro}', $bairro, $formulario);
        $formulario = str_replace('{cidade}', $cidade, $formulario);
        $formulario = str_replace('{uf}', $uf, $formulario);
        $formulario = str_replace('{celular}', $celular, $formulario);
        $formulario = str_replace('{email}', $email, $formulario);
        $formulario = str_replace('{nascimento}', $nascimento, $formulario);
        $formulario = str_replace('{idade}', $idade, $formulario);
        $formulario = str_replace('{peso}', $peso, $formulario);
        $formulario = str_replace('{altura}', $altura, $formulario);
        $formulario = str_replace('{sexo}', $sexo, $formulario);

        print $formulario;
    }

    function relatorio($linha) {
       $relatorio = file_get_contents('html/relatorio.html');
       $relatorio = str_replace('{matricula}', $linha['matricula'],$relatorio);
       $relatorio = str_replace('{nome}', $linha['nome'], $relatorio);
       $relatorio = str_replace('{endereco}', $linha['endereco'], $relatorio);
       $relatorio = str_replace('{cep}', $linha['cep'], $relatorio);
       $relatorio = str_replace('{bairro}', $linha['bairro'], $relatorio);
       $relatorio = str_replace('{cidade}', $linha['cidade'], $relatorio);
       $relatorio = str_replace('{uf}', $linha['uf'], $relatorio); 
       $relatorio = str_replace('{celular}', $linha['celular'], $relatorio);
       $relatorio = str_replace('{email}', $linha['email'], $relatorio);
       $relatorio = str_replace('{celular}', $linha['celular'], $relatorio);
       $relatorio = str_replace('{nascimento}', $linha['nascimento'], $relatorio);
       $relatorio = str_replace('{idade}', $linha['idade'], $relatorio);
       $relatorio = str_replace('{peso}', $linha['peso'], $relatorio);
       $relatorio = str_replace('{altura}', $linha['altura'], $relatorio);
       $relatorio = str_replace('{sexo}', $linha['sexo'], $relatorio); 
       $relatorio = str_replace('{imc}', $linha['imc'], $relatorio);
       $relatorio = str_replace('{resultado}', $linha['resultado'], $relatorio);

       echo $relatorio;     
    }
    
?>