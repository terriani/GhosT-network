<?php
//Controller gerado automaticamente via - Scooby-CLI em 03-12-19 - 14:25:pm

namespace Controllers;

use Carbon\Carbon;
use \Core\Controller;
use Helpers\FlashMessage;
use Helpers\Pagination;
use Helpers\Redirect;
use Helpers\Request;
use Models\Comment;
use Models\Post;

class PostController extends Controller
{
   /**
    * Carrega o feed de posts e seus respectivos comentarios
    *
    * @return void
    */
   public function index()
   {
      FlashMessage::getUrlError();
      $post = new Post;
      $this->postValidate();
      $comments = Comment::orderBy('id', 'DESC')->get();
      $paginator = Pagination::paginate($post, 10, 'desc');
      $this->Load("Pages", "Photos", [
         'posts' => $paginator['data'],
         'comments' => $comments,
         'pagination' => $paginator['pages']
      ]);
   }

   /**
    * Carrega a view para a criação de um novo post
    *
    * @return void
    */
   public function create()
   {
      FlashMessage::getUrlError();
      $this->Load('pages', 'newPost');
   }

   /**
    * Salva o novo post no banco de dados
    *
    * @return void
    */
   public function store()
   {
      Request::formValidate('title', 'titulo', 'new-post', ['required', 'min'], 3);
      Request::formValidate('text', 'texto', 'new-post', ['required', 'min'], 3);
      $title = Request::input('title');
      $text = Request::input('text');
      if($_FILES['img']['type'][0] != 'image/png' and $_FILES['img']['type'][0] != 'image/jpeg'){
         $this->Load('Pages', 'newPost', ['msg' => FlashMessage::toast('Opss...', 'A imagem só é aceita nos formatos JPEG ou PNG', 'error')]);
         exit;
      }
      $img = Request::upload('img');
      if (!$img[0]) {
         $this->Load('Pages', 'newPost', ['msg' => FlashMessage::toast('Opss...', 'Algo saiu errado, por favor tente novamente', 'error')]);
         exit;
      }
      $img = implode('', $img[1]);
      $post = new Post;
      $post->title = $title;
      $post->text = $text;
      $post->img = $img;
      //$post->likes = 0;
      $post->save();
      Redirect::redirectTo('photos');
   }

   /**
    * Adiciona um like ao post selecionado
    *
    * @param int $id
    * @return void
    */
   public function like(int $id)
   {

      $post = Post::find($id);
      $post->title;
      $like = $post->likes;
      $like += 1;
      $post->update([
         'likes' => $like,
      ]);
      $post->save();
      echo $post->likes;
   }

   /**
    * Valida a duração de um post
    *
    * @return void
    */
   private function postValidate()
   {
      $post = Post::all();
      foreach ($post as $p) {
         $datePost = $p->created_at;
         $datePost = Carbon::parse($datePost);
         $diff = $datePost->diffInDays(Carbon::now());
         if ($diff >= 2) {
            $comment = new Comment;
            $comment->where('post_id', $p->id)->delete();
            unlink($p->img);
            $p->delete();
         }
      }
   }
}
