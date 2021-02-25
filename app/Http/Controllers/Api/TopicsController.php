<?php

namespace App\Http\Controllers\Api;

use App\Models\Topic;
use App\Transformers\TopicsTransformer;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\User;
use Auth;
use App\Handlers\ImageUploadHandler;
use App\Models\Link;

class TopicsController extends Controller
{

    public function index(Request $request, Topic $topic, User $user, Link $link)
    {
        $topics = $topic->withOrder($request->order)
                        ->with('user', 'category')  // 预加载防止 N+1 问题
                        ->paginate(20);
        return $this->response->paginator($topics,new  TopicsTransformer());
    }

}
