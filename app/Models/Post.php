<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $slug;
    public $title;
    public $excerpt;

    public function __construct($title, $excerpt, $slug)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->excerpt = $excerpt;

    }

    public static function find($slug)
    {

        if(!file_exists(   resource_path("/posts/$slug.html") )){
            // ddd('test');
            throw new ModelNotFoundException();
        };

       $path  = resource_path("/posts/$slug.html");
   //     dd($path);
        return cache()->remember("test",10, fn() => file_get_contents($path));
    }

    //how to get this function into a static method
    public function getPath($slug)
    {

    }

    public static function all()
    {
        $posts = File::files(resource_path("/posts"));

        $data = array_map(function($post){

            $yaml =  YamlFrontMatter::parse($post->getContents());
            return   new Post(
                         $yaml->matter('title'),
                         $yaml->matter('excerpt'),
                         $yaml->matter('slug')
            );
        }, $posts );

        return $data;
    }
}
