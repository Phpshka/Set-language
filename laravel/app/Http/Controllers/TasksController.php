<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function userTasks($id){
        $user = User::with('tasks')->where('id', $id);
        return view('userTasks', compact('user'));
    }
    public function index($id){
        $card = Card::find($id);

        $tasks = $card->tasks;
        return view('tasks', compact('card', 'tasks'));
    }
    public function store(Request $request){
        $name = $request->get('name');
        $cardId = $request->get('cardId');
        $date = Carbon::now();
        DB::table('tasks')->insert([
            "name"=>$name,
            "created_at"=>$date,
            "updated_at"=>$date,
            "is_completed"=>false,
            "card_id"=>$cardId,
        ]);
        return redirect('/tasks/' . $cardId);

    }
    public function updateStatus(Request $request){
        $taskId = $request->get('taskId');
        $newStatus = $request->get('newStatus');
        $cardId = $request->get('cardId');
        DB::table('tasks')->where('id', $taskId)->update(['is_completed'=>$newStatus]);
        return response()->json('success');

    }

}
