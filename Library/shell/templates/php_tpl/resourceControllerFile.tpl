<?php
//Controller gerado automaticamente via - Scooby-CLI em dateNow

namespace Controllers;

use \Core\Controller;

class $name extends Controller
{
    /**
     * Exibe todos os registros
     *
     * @return void
     */
    public function index()
    {
         $this->Load("Pages", "", []);
    }
     
    /**
     * Exibe o formulário de novo registro
     *
     * @return void
     */
    public function create()
    {
        $this->Load("Pages", "", []);
    }
 
    /**
     * Salva o novo registro no banco de dados
     *
     * @return void
     */
    public function store()
    {
        //Logica para salvar os dados no banco
    }
 
    /**
     * Mostra um registro específico buscanco pelo seu id 
     *
     * @param integer $id
     * @return void
     */
    public function show(int $id)
    {
        $this->Load("Pages", "", []);
    }
 
    /**
     * Exibe o furmulário de edição de um registro específico
     * buscando pelo seu id
     *
     * @param integer $id
     * @return void
     */
    public function edit(int $id)
    {
        $this->Load("Pages", "", []);
    }
 
    /**
     * Atualiza um registro específico no banco de dados
     *
     * @param integer $id
     * @return void
     */
    public function update(int $id)
    {
        //Logica para a alteração do registro
    }
     
    /**
     * Apaga um registro específico buscando pelo id no banco de dados 
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        //Logica para a deleção do registro
    }
}
