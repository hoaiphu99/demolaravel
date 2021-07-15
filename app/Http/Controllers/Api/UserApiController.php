<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $user = User::all()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection($user)]);
    }

    /**
     * Display a listing deleted of the resource.
     *
     * @return JsonResponse
     */
    public function getUserSoftDeleted()
    {
        $user = User::onlyTrashed()->get()->sortDesc();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection($user)]);
    }

    /**
     * Upload Image to Imgur
     *
     * @param $resource
     * @return string
     * @throws GuzzleException
     */
    public function uploadImage($resource) {
        $imgur_client = new Client(['base_uri' => Config::get('siteVars.IMGUR_URL_API')]);
        try {
            $imgur_response = $imgur_client->post('image', [
                'headers' => [
                    'Authorization' => 'Client-ID '.Config::get('siteVars.IMGUR_CLIENT_ID'),

                ],
                'multipart' => [
                    [
                        'Content-Type' => 'multipart/form-data; boundary=<calculated when request is sent>',
                        'name' => 'image',
                        'contents' => $resource,
                    ]
                ]
            ]);
            return $img_link = json_decode($imgur_response->getBody()->getContents())->data->link;

        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
            return "";
        }
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $user_un = User::where(['username' => $request->get('username')])->first();
        if($user_un != null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.exist_msg'), 'data' => UserResource::collection([$user_un])]);
        }
        $user = User::create($request->all());
        
        if ($file = $request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $resource = fopen($file, "r") or die("File upload Problems");

            $img_link = $this->uploadImage($resource);

            $user->update(['avatar' => $img_link]);
        }

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection([$user])], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        //$user = User::where(['id' => $id])->get();
        $user = User::where(['id' => $id])->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection([$user])], 201);
        //return response()->json(['status' => 1, 'data' => $user], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::where(['id' => $id])->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        $user->update($request->all());
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection([$user])], 200);

    }

    /**
     * Update avatar for user.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function updateAvatar(Request $request, $id) {
        $user = User::where(['id' => $id])->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        $file = $request->file('avatar');
        if ($file == null) {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.fileNotExist_msg'), 'data' => null]);
        }
        $resource = fopen($file, "r") or die("File upload Problems");

        $img_link = $this->uploadImage($resource);
        $user->update(['avatar' => $img_link]);

        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection([$user])], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        $user->delete();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    /**
     * Remove the specified resource from DB
     *
     * @param  $id
     * @return JsonResponse
     */
    public function forceDestroy($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        $user->forceDelete();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    /**
     * Restore the specified resource from DB
     *
     * @param  $id
     * @return JsonResponse
     */
    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if($user == null)
        {
            return response()->json(['status' => Config::get('siteMsg.fails_code'),
                'message' => Config::get('siteMsg.notExist_msg'), 'data' => null]);
        }
        $user->restore();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
            'message' => Config::get('siteMsg.success_msg'), 'data' => null], 200);
    }

    public function getUserWthPostCount() {
        //$user = User::orderBy(['post_count' => 'DESC'])->get();
        $user = User::select('*')->orderByDesc('post_count')->get();
        return response()->json(['status' => Config::get('siteMsg.success_code'),
        'message' => Config::get('siteMsg.success_msg'), 'data' => UserResource::collection($user)]);
    }

    // Ham nay dung de dem lai so post cua tat ca user
    public function updateCount(){
        $users = User::all();
        $users = json_decode($users);
        foreach ($users as $user) {
            $posts = Post::where(['user_id' => $user->id])->get();
            $posts = json_decode($posts);
            $post_count = count($posts);
            User::where(['id' => $user->id])->update(['post_count' => $post_count]);
        }
    }
}
