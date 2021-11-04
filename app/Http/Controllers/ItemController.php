<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Item;
use App\Models\Picture;
use Illuminate\Http\Request;
use Auth;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    //

    public function makeOffer()
    {
        if (Auth::user() && Auth::user()->id) {
            $user = Auth::user();
            $items = $user->items;
            return view('item.form', [
                'user' => $user,
                'items' => $items,
            ]);
        }
    }

    public function storeOffer(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $item = Item::create([
            'name' => $request->name,
            'owner' => $user->id,
        ]);
        $description = Description::create([
            'text' => $request->description,
            'item_id' => $item->id,
        ]);
        $pic = $this->picStore($request, $item);
        return redirect('dashboard');
    }

    private function picStore(Request $request, Item $item)
    {

        // dd($request->file('pic'), $request->file(), $request);
        if ($request->hasFile('pic')) {
            //  Let's do everything here
            if ($request->file('pic')->isValid()) {
                $validated = $request->validate([
                    'pic' => 'mimes:jpeg,png|max:1014',
                ]);
                $name = pathinfo($validated['pic']->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $validated['pic']->extension();
                // dd($name,$extension);
                $validated['pic']->storeAs('/public', $name . "." . $extension);
                $url = Storage::url($name . "." . $extension);
                $file = Picture::create([
                    'name' => $name,
                    'url' => $url,
                    'item_id' => $item->id,
                ]);
                Session::flash('success', "Success!");
                return $file;
            }
        }
        abort(500, 'Could not upload image :(');
    }
}
