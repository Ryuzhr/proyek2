<?php

namespace App\Models;



class Post 
{
   private static $blog_posts = [
    [
        "title" => "Aku Manusia Baik Baik",
        "slug" => "aku-manusia-baik-baik",
        "author" => "Ridhan Zakie",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis numquam reprehenderit nihil rerum perspiciatis libero sit maiores et sapiente deleniti praesentium molestias totam neque, 
        dignissimos, doloribus amet enim fugit ipsum! Quas esse ex ab! Perspiciatis, itaque nobis obcaecati laudantium quia, sit dignissimos officiis dicta ipsam est pariatur odit debitis quam eligendi laboriosam placeat sunt aut, quo hic illo aliquam? 
        Explicabo nostrum molestiae assumenda reprehenderit iusto doloremque quis debitis recusandae quasi dolores eligendi, ea accusantium earum cupiditate inventore, error harum commodi?"
    ],
    [
        "title" => "Aku Manusia Tidak Baik Baik",
        "slug" => "aku-manusia-tidak-baik-baik",
        "author" => "Ridhan Zakie",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis numquam reprehenderit nihil rerum perspiciatis libero sit maiores et sapiente deleniti praesentium molestias totam neque, 
        dignissimos, doloribus amet enim fugit ipsum! Quas esse ex ab! Perspiciatis, itaque nobis obcaecati laudantium quia, sit dignissimos officiis dicta ipsam est pariatur odit debitis quam eligendi laboriosam placeat sunt aut, quo hic illo aliquam? 
        Explicabo nostrum molestiae assumenda reprehenderit iusto doloremque quis debitis recusandae quasi dolores eligendi, ea accusantium earum cupiditate inventore, error harum commodi?"
    ]
    ];
    public static function all()
    {
        return self::$blog_posts;
    }
    public static function find($slug)
    {
        $posts = self::$blog_posts;
        $posts = [];
        foreach($posts as $p) {
            if($p["slug"] === $slug) {
                $posts = $p;
            }
        }
    }
}
