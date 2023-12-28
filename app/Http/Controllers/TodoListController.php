<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index()
    {
        return view('todo', ['listItems' => ListItem::where('is_complete', 0)->get() ]); // listItems becomes variable in view -> $listItems
    }

    public function saveItem( Request $request )
    {
        // dd( json_encode( $request->all() ) );

        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        // return view('todo', ['listItems' => ListItem::all() ]);
        return redirect('/todo');
    }

    public function markComplete( $id )
    {
        // \Log::info( $id );

        $listItem = ListItem::find( $id );

        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/todo');
    }
}
