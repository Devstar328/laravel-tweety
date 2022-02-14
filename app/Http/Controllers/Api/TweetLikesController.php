<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\LikesController;
use App\Tweet;

class TweetLikesController extends LikesController
{
    public function store(Tweet $tweet)
    {
        $result = $tweet->like(current_user());

        if (!$result instanceof \App\Like) {
            return $this->sendResponse($this->removeResponse());
        }
        return $this->sendResponse($this->likeResponse());
    }

    public function destroy(Tweet $tweet)
    {
        $result = $tweet->dislike(current_user());
        
        if (!$result instanceof \App\Like) {
            return $this->sendResponse($this->removeResponse());
        }
        return $this->sendResponse($this->dislikeResponse());
    }
}
