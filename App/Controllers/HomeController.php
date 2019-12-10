<?php

namespace Controllers;

use \Core\Controller;
use Helpers\Email;
use Helpers\FlashMessage;
use Helpers\Request;

class HomeController extends Controller
{
    /**
     * Metodo principal da classe
     *
     * @return void
     */
    public function index()
    {
        $this->Load('pages', 'Home');
    }

    public function contact()
    {
        if(Request::has('name') and Request::has('email') and Request::has('message')){
            $name = Request::input('name');
            $email = Request::input('email');
            $msg = Request::input('message');
            $emailSend = Email::sendEmailWithSmtp("Contato de usuario da GhosT -  $name", $msg, ['viniterriani.vt@gmail.com'], [$email]);
            if($emailSend){
                FlashMessage::modalWithHref('Ok...', 'Menssagem enviada com sucesso, assim que possível retornaremos o seu contato.', 'success', '/');
            }else{
                FlashMessage::modalWithHref('Opss...', 'Sua menssagem não pode ser enviada, por favor tente novamente mais tarde.', 'error', '/');
            }
        }else{
            FlashMessage::modalWithHref('Opss...', 'Sua menssagem não pode ser enviada, por favor tente novamente mais tarde.', 'error', '/');   
        }
    }
}
