<?php

namespace App\Http\Controllers;

use App\Models\CardDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    public function index(){
        $cards = DB::table('cards')->get();
        return view('cards',compact('cards'));
    }
    public function addDetail(Request $request){
        $cardId = $request->get('card_id');
        CardDetail::create($request->all());
        return redirect('/tasks/' . $cardId);

    }
    public function store(Request $request){
        $title = $request->get('title');
        $date = Carbon::now();
        DB::table('cards')->insert([
            "name"=>$title,
            "created_at" => $date,
            "updated_at" => $date,
        ]);
        return redirect('/');
    }
    public function destroy(Request $request){
        $cardId = $request->get('cardId');
        DB::table('cards')->delete($cardId);
        return redirect('/');
    }

    public function update(Request $request){
        $newTitle = $request->get('title');
        $cardId = $request->get('cardId');

        DB::table('cards')->where('id', $cardId)->update(["name"=>$newTitle]);
        return redirect('/tasks/' . $cardId);
    }
}
