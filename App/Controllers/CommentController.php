<?php
//Controller gerado automaticamente via - Scooby-CLI em 03-12-19 - 14:58:pm

namespace Controllers;

use \Core\Controller;
use Helpers\Redirect;
use Helpers\Request;
use Models\Comment;

class CommentController extends Controller
{
    /**
     * Salva o novo registro no banco de dados
     *
     * @return void
     */
    public function store()
    {
        
        $id = Request::input('post_id');
        $comment = new Comment;
        $comment->comment = Request::inputWithStripTags('comment');
        $comment->post_id = $id;
        $comment->save();
        Redirect::redirectBack();
    }
}
