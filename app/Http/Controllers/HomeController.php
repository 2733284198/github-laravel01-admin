<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        echo 'home-index';
    }

    public function res()
    {
        return response('Hello World-res', 200)
            ->header('Content-Type', 'text/plain');
    }

    public function hello(Request $request)
    {
        dump($request->query);
//        dd($request->query);

        echo 'home-hello';
    }

    public function viewt()
    {
        $data = array(
            'name'=>'manlan1',
            'age'=>20,
        );

        $name = "manlan";
        return view('test1', ['name' => "manlan" ] );
    }

    public function dbtest()
    {
//        $users = DB::select('select * from user where status = ?', [1]);
        $users = DB::select('select * from user');
//        dd($users);
        foreach ($users as $user) {
            echo $user->name;
        }
    }

    public function dbtest2()
    {
//        $users = DB::select('select * from user where status = ?', [1]);
//        $users = DB::table('user')->get();
//        $users = DB::table('user')->first();
//        $users = DB::table('user')->pluck('name','age');
//        $users = DB::table('user')->select('name','age')->get();
        $users = DB::table('user')
            ->select('name','age')
//            ->where('id', '=', 2)
            ->get();
        dd($users);
//        foreach ($users as $user) {
//            echo $user->name;
//        }
    }



    //  集合
    public function coll()
    {
        $coll1 = collect([1,2,3,4]);
//        dd($coll1);
//        var_dump($coll1->first);
//        return $coll1->first(function ($value) {
//            return $value > 2;
//        });

//        return $coll1->first;

        // coll2
        $coll2 = collect([
            "name" => "name1",
            "male" => "male",
            "age" => 20
        ]);

//        var_dump($coll2->flatten());
//        dd($coll2->flatten());
        $coll2->sortKeys();
//        dd($coll2->flatten());
        dump($coll2->flatten());
//        dd($coll2->get("name"));
    }


    // Eloquent继承了collect
    public function dbtest3()
    {
        $users = DB::table('user')
//            ->select('name','age')
            ->get();

        // filter可以了
        /*$coll1 = $users->filter(function ($u){
            return $u->age === 10;
            return $u->id === 1;
            return ($u->name === "name3") && ($u->age === 3);
            return ($u->name === "name3") && ($u->age > 1);
        });
        pd($coll1);*/

//        $users->map(function ($user) {
//        $user1 = $users->only([1]);
//        $user1 = $users->only([1])

        $users->map(function ($user) {
//        ->map(function ($user) {
            $user->age = $user->age .'[岁]';
           $user->email = strtoupper($user->email);

            if ($user->male == 1) {
                $user->male = "男";
            }else if($user-> male == 2) {
                $user->male = "女";
            }
           return $user;
        });
//        pd($user1);
        pd($users);
    }
}
