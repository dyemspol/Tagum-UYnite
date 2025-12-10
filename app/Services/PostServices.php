<?php

namespace App\Services;

class PostServices
{
    public function getPostReactions($postId)
    {
        $post = Post::findOrFail($postId);
        return [
            'likes' => $post->reactions->where('reaction_type', 'like')->count(),
            'dislikes' => $post->reactions->where('reaction_type', 'dislike')->count(),
        ];
    }
}