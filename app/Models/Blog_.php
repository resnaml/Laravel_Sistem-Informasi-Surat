<?php

namespace App\Models;


class blog
{
    private static $blog_post = [
        [
            "title" => "judul pertama",
            "slug" => "tulisan pertama",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam itaque magni dolores reiciendis nemo, aspernatur excepturi doloribus fugit ratione ducimus suscipit consectetur quos ea nostrum natus distinctio illo, quam iure? Pariatur repellendus ipsam inventore adipisci deleniti saepe eaque optio voluptatem?"
        ],
        [
            "title" => "judul kedua",
            "slug" => "tulisan kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam itaque magni dolores reiciendis nemo, aspernatur excepturi doloribus fugit ratione ducimus suscipit consectetur quos ea nostrum natus distinctio illo, quam iure? Pariatur repellendus ipsam inventore adipisci deleniti saepe eaque optio voluptatem?"
        ]
        ];

        public static function all()
        {
            return collect (self::$blog_post);
        }
        public static function find($slug)
        {
            $blog_post = static::all();
            return $blog_post->firstWhere('slug', $slug);
        }
}
