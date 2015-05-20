<?php
namespace Dallin\Chat;
use Evenement\EventEmitterInterface;
use Exception;
use Ratchet\ConnectionInterface;
use SplObjectStorage;
use Post;
use Comment;
use Like;
use Attack;
class Chat
implements ChatInterface
{
    protected $users;
    protected $emitter;
    protected $id = 1;
    public function getUserBySocket(ConnectionInterface $socket)
    {
        foreach ($this->users as $next)
        {
            if ($next->getSocket() === $socket)
            {
                return $next;
            }
        }
        return null;
    }
    public function getEmitter()
    {
        return $this->emitter;
    }
    public function setEmitter(EventEmitterInterface $emitter)
    {
        $this->emitter = $emitter;
    }
    public function getUsers()
    {
        return $this->users;
    }
    public function __construct(EventEmitterInterface $emitter)
    {
        $this->emitter = $emitter;
        $this->users   = new SplObjectStorage();
    }
    public function onOpen(ConnectionInterface $socket)
    {
        $user = new User();
        $user->setId($this->id++);
        $user->setSocket($socket);
        $this->users->attach($user);
        $this->emitter->emit("open", [$user]);
    }
    public function onMessage(
        ConnectionInterface $socket,
        $message
    )
    {
        $user = $this->getUserBySocket($socket);
        $message = json_decode($message);
        switch ($message->type)
        {
            case "id_update":
            {
                
                $user->setId($message->data);
                $this->emitter->emit("id_update", [
                    $user,
                    $message->data
                ]);
                break;
            }
            case "message":
            {
                $this->emitter->emit("message", [
                    $user,
                    $message->data
                ]);
                
                foreach ($this->users as $next)
                {
                    if ($next !== $user)
                    {
                        $next->getSocket()->send(json_encode([
                            "user" => [
                                "id"   => $user->getId(),
                                "name" => $user->getName()
                            ],
                            "message" => $message
                        ]));
                    }
                }
                
                break;
            }
            
            case "post":
            {
                
                $post = new Post();
                $post->user_id = $user->getId();
                $post->content = $message->data;
                $post->HP = 100;
                $post->save();
                $notify = $post;
                $this->emitter->emit("post", [
                    $user,
                    $notify
                    
                ]);
                $message->data = $post;
                
                foreach ($this->users as $next)
                {
                    
                        $next->getSocket()->send(json_encode([
                            "user" => [
                                "id"   => $user->getId(),
                                "name" => $user->getName()
                            ],
                            "message" => $message
                        ]));
                    
                }
                break;
            }
            
            case "create-comment":
            {
                //need to fix
                $comment = new Comment();
                $comment->user_id = $user->getId();
                $comment->post_id = $message->data->postid;
                $comment->content = $message->data->postcontent;
                $comment->save();
                
                $notify = "just create a comment";
                
                $this->emitter->emit("create-comment", [
                    $user,
                    $notify
                ]);
                $message->data = $comment;
                
                foreach ($this->users as $next)
                {
                        $next->getSocket()->send(json_encode([
                            "user" => [
                                "id"   => $user->getId(),
                                "name" => $user->getName()
                            ],
                            "message" => $message
                        ]));
                }
                
                
                
                break;
            }
            case "like-post":
                $like = new Like();
                $like->user_id = $user->getId();
                $like->likable_id = $message->data;
                $like->likable_type = 'Post';
                $like->save();
                
                $notify = "just like a post";
                $this->emitter->emit("like-post", [
                    $user,
                    $notify
                ]);
                $message->data = $like;
                foreach ($this->users as $next)
                {
                        $next->getSocket()->send(json_encode([
                            "user" => [
                                "id"   => $user->getId(),
                                "name" => $user->getName()
                            ],
                            "message" => $message
                        ]));
                }
                break;
            case "edit-post":
                $post = Post::find($message->data->postid);
                
                $post->content = $message->data->postcontent;
                
                $post->save();
                $notify = "you just edited a post";
                $this->emitter->emit("edit-post", [
                    $user,
                    $notify
                    
                ]);
                $message->data = $post;
                
                foreach ($this->users as $next)
                {
                    
                        $next->getSocket()->send(json_encode([
                            "user" => [
                                "id"   => $user->getId(),
                                "name" => $user->getName()
                            ],
                            "message" => $message
                        ]));
                    
                }
                
                break;
            case "attack-post":
                $post_id = $message->data->postid;
                $damage = $message->data->damage;
                $attack = new Attack();
                $attack->user_id = $user->getId();
                $attack->post_id = $post_id;
                $attack->damage = $damage;
                $attack->save();
                
                $post = Post::find($post_id);
                $hp = $post->HP;
                $hp -= $damage;
                if ($hp < 1)
                    $hp = 1;
                $post->HP = $hp;
                $post->save();
                
                $notify = "you just attacked a post";
                $this->emitter->emit("attack-post", [
                    $user,
                    $notify
                    
                ]);
                $message->data = $attack;
                foreach ($this->users as $next)
                {
                    
                        $next->getSocket()->send(json_encode([
                            "user" => [
                                "id"   => $user->getId(),
                                "name" => $user->getName()
                            ],
                            "message" => $message
                        ]));
                    
                    
                }
                
                
                break;
            
        }  
        
    }
    public function onClose(ConnectionInterface $socket)
    {
        $user = $this->getUserBySocket($socket);
        if ($user)
        {
            $this->users->detach($user);
            $this->emitter->emit("close", [$user]);
        }
    }
    public function onError(
        ConnectionInterface $socket,
        Exception $exception
    )
    {
        $user = $this->getUserBySocket($socket);
        if ($user)
        {
            $user->getSocket()->close();
            $this->emitter->emit("error", [$user, $exception]);
        }
    }
}