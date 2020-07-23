<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Burger;
use DB;


class BurgerController extends Controller
{
    

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function initial(Request $request)
    {
        try{         	
            $burger = [
			   "ingredients"=>[
			      "salad"=>0,
			      "bacon"=>0,
			      "cheese"=>0,
			      "meat"=>0
			   ],
			   "price"=>4,
			   "ingredientsPrice"=>[
			      "salad"=>0.5,
			      "bacon"=>0.4,
			      "cheese"=>0.5,
			      "meat"=>1
			   ],
			   "customer"=>[
			      "name"=>"shamshad",
			      "email"=>"sham@gmail.com"
			   ]
			];
           return response()->json($burger, 200);
        }
        catch(\Exception $e){
        	var_dump($e->getMessage());
            report($e);
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{      	
            $burger = new Burger([
                'ingredients' => $request->get('ingredients'),
                'price'=> $request->get('price'),
                'customer'=> $request->get('customer'),
                'user_id'=> $request->get('user_id'),
            ]);
           $burger->save();
           $burger = DB::table('burgers')->orderBy('id','asce')->first();
           return response()->json($burger, 200); ;
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders(Request $request)
    {
        try {
            $token = $request->bearerToken();
            $user = DB::table('users')->where('api_token',$token)->first();
            $order = DB::table('burgers')->where('user_id',$user->id)->orderBy('id','asce')->paginate(10);
            return response()->json($order, 200);       
        } 
        catch (Exception $e) {
            report($e);
            return false;
        }
    }
}
