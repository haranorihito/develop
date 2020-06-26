<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use Storage;

class FoodController extends Controller
{
    //
    public function add(){
        return view('admin.food.create');
    }
    
    public function create(Request $request){
        $this->validate($request, Food::$rules);
        $food = new Food;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $food->image_path = Storage::disk('s3')->url($path);
        } else {
            $food->image_path = null;
        }
        
        if (isset($form['link1'])) {
            $food->link1 = $form['link1'];
        }else{
            $food->link1 = null;
        }
        
        if (isset($form['link2'])) {
            $food->link2 = $form['link2'];
        }else{
            $food->link2 = null;
        }
        
        if (isset($form['map'])) {
            $food->map = $form['map'];
        }else{
            $food->map = null;
        }
        
        $food->user_id = \Auth::user()->id;
        
        unset($form['_token']);
        unset($form['image']);
        unset($form['link1']);
        unset($form['link2']);
        unset($form['map']);
        
        $food->fill($form);
        $food->save();
        
        return redirect('admin/food/create');
    }
    
    public function index(Request $request){
        $cond_title = $request->cond_title;
        $genre = $request->genre;
        
        if($cond_title != ''){
            $posts = Food::where('shopname', $cond_title)->get();
        }elseif($genre != ''){
            $posts = Food::where('genre', $genre)->get();
        }else{
            $posts = Food::all();
        }
        
        return view('admin.food.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function detail(Request $request){
        $food = Food::find($request->id);
        $count_favorite_users = $food->favorite_users()->count();

        return view('admin.food.detail2', ['food' => $food, 'count_favorite_users'=>$count_favorite_users]);
    }
    
    public function edit(Request $request){
        $food = Food::find($request->id);
        if(empty($food)){
            abort(404);
        }
        
        return view('admin.food.edit', ['food_form' => $food]);
    }
    
    public function update(Request $request){
        $this->validate($request, Food::$rules);
        $food = Food::find($request->id);
        $food_form = $request->all();
        if (isset($food_form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$food_form['image'],'public');
            $food->image_path = Storage::disk('s3')->url($path);
            unset($food_form['image']);
         } elseif (isset($request->remove)) {
            $food->image_path = null;
            unset($food_form['remove']);
        }
        unset($food_form['_token']);
        $food->fill($food_form)->save();
        
        return redirect('admin/food/edit?id=' . $request->id);
    }
    
    public function delete(Request $request){
        $food = Food::find($request->id);
        $food->delete();
        
        return redirect('admin/food/index');
    }
    
}
