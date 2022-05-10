<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use function PHPUnit\Framework\throwException;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $sluge;
    public $body;

    public function __construct($title, $excerpt, $date, $sluge, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->sluge = $sluge;
        $this->body = $body;
    }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            $files = File::files($path = resource_path("allPosts/"));
            return collect($files)
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post($document->title, $document->excerpt, $document->date, $document->sluge, $document->body());
                })->sortByDesc('date');
        });

        // $posts = array_map(function ($file) {

        //     $document = YamlFrontMatter::parseFile($file);

        //     return new Post($document->title, $document->excerpt, $document->date, $document->sluge, $document->body());
        // }, $files);

        // $document = array_map(function ($file) {

        //     return YamlFrontMatter::parseFile($file);
        // }, $files);

    }

    public static function find($slug)
    {
        return static::all()->firstWhere('sluge', $slug);
    }


    public static function findOrFail($slug)
    {
       // return ( static::find($slug) ?? throw new ModelNotFoundException());   //short hand

        $thePost = static::find($slug);
        if (!$thePost) {
            throw new ModelNotFoundException();
        }
        return ($thePost);

        // $path = resource_path("allPosts/{$slug}.html");
        // $cn = YamlFrontMatter::parseFile(($path));

        // if (!file_exists($path = resource_path("allPosts/{$slug}.html"))) {
        //     abort(404);
        // }

        // return cache()->remember(
        //     "post.{$slug}",
        //     30,
        //     fn () => $cn
        // );
    }
}
