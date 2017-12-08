<?php

// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.

    require_once __DIR__."/../models/Produto.php";
    require_once __DIR__."/../models/CrudProdutos.php";


if ($_GET['acao'] == 'comprar'){

    $crud = new CrudProdutos();
    $crud->comprar($_GET['codigo'], $_GET['quantidade']);
}


if ( $_GET['acao'] == 'cadastrar'){

    //$nome, $preco, $categoria, $estoque, $codigo
    $produto = new Produto($_POST['nome'], $_POST['preco'], $_POST['categoria'], $_POST['quantidade']);
    $crud= new CrudProdutos();
    $crud->salvar($produto);

    header("location: ../views/admin/produtos.php");
}

if ( $_GET['acao'] == 'editar'){

    $crud = new CrudProdutos();

    $produto = new Produto($_POST["nome"], $_POST["preco"], $_POST["categoria"], $_POST["estoque"], $_POST['codigo']);

    $crud->editarProduto($produto);
    header("location: ../views/admin/produtos.php");
}

if ( $_GET['acao'] == 'excluir'){

    $crud = new CrudProdutos();
    $crud->excluirProduto($_GET['codigo']);

    header("location: ../views/admin/produtos.php");

}