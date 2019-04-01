<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userSide.sellingPage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $rules = [
            "image" => "file",
            "name" => "required",
            "price" => "required",
            "reason" => "required",
        ];
        $data = $this->validate($request, $rules);
        $url = request()->image->store("uploads");
        $data['image'] = $url;
        $data["user_id"] = auth()->user()->id;
        $friend = Friend::create($data);
        return redirect('/sold');
    }

    public function soldFriendApi()
    {
        $friends = Friend::orderBy('id')->where("user_id", auth()->ueer()->id)->get();
        $response = [
            "success" => true,
            "friends" => $friends,
        ];
        return Response::json($response);
    }

//    the friend that has just been sold
    public function friendSold()
    {
        $friend = Friend::orderBy('id')->first();
        $data = [
            "friend" => $friend
        ];
        return view('userSide.sold', $data);
    }

    public function soldFriendPage()
    {
        return view('userSide.soldFriends');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Friend $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
