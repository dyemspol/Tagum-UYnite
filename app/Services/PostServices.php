<?php

namespace App\Services;

use App\Models\Report;

class PostServices
{
    public function getPostReactions($postId)
    {
        $post = Report::findOrFail($postId);
        return [
            'likes' => $post->reactions->where('reaction_type', 'like')->count(),
            'dislikes' => $post->reactions->where('reaction_type', 'dislike')->count(),
        ];
    }
}
