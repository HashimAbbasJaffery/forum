<?php 

namespace App\Classes;

use App\Http\Controllers\AjaxController;


class MarkupGenerator {

//     @foreach($question->tags as $tag)
//     <x-tag href='/tag/{{ $tag->name }}' class='bg-a3d39c'>{{ $tag->name }}</x-tag>
// @endforeach

// @forelse ($question->comments as $comment)
// @if($loop->iteration > 3) @break @endif
// <x-user :letter='$comment->user->name[0] ?? 'A''/>
// @empty
// <p>No Comments</p>
// @endforelse

// {{ count($question->comments) }}
    private static function users($users) {
        $userLists = "";
        $iterator = 0;
        if(!$users) {
            $userLists = "<p>No Comments</p>";
            return;
        } 
        foreach($users as $user) {
            if($iterator > 3) 
                break;
            $letter = $user->user->name[0] ?? "A";
            $userLists .= "                                
            <div>
            <a href='#' class='avatar'> <img src='fonts/icons/avatars/$letter.svg' alt='avatar'></a>
        </div>";
            $iterator++;
        }
        return $userLists;
    }
    private static function tags($tags) {
        $tagsMarkup = "";
        $remaining = http_build_query(request()->except("tag", "_token_"));
        foreach($tags as $tag) {
            $tagsMarkup .= "<a href='?&$remaining&tag=$tag->name' class='bg-a3d39c'>$tag->name</a>";
        }
        return $tagsMarkup;
    }
    private static function template($question) {
        $slug = $question->category->slug;
        $category = $question->category->name;
        $tags = MarkupGenerator::tags($question->tags);
        $users = MarkupGenerator::users($question->comments);
        $counts = count($question->comments);
        $remaining = http_build_query(request()->except("category", "_token_"));
        $template = "<div class='posts__item bg-f2f4f6'>
        <div class='posts__section-left'>
            <div class='posts__topic'>
                <div class='posts__content'>
                    <a href='/question/$question->slug'>
                        <h3>$question->title</h3>
                    </a>
                    <div class='posts__tags tags'>
                        $tags
                    </div>
                </div>
            </div>
            <div class='posts__category'><a href='/?$remaining&category=$slug' class='category'><i class='bg-a7cdbd'></i>$category</a></div>
        </div>
        <div class='posts__section-right'>
            <div class='posts__users'>
                $users
            </div>
            <div class='posts__replies'>$counts</div>
        </div>
    </div>";
        return $template;
    }
    public static function Generate($questions) {
        $output = '';
        foreach($questions as $question) {
            $output .= MarkupGenerator::template($question);
        }
        return $output;
    }
}