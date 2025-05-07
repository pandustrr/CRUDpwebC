<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pengelolaan', ['widgets' => $menus, 'username' => session('username', 'Admin')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Menu::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('pengelolaan')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('pengelolaan')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        if (Menu::count() === 0) {
            Menu::truncate(); 
        }

        return redirect()->route('pengelolaan')->with('success', 'Menu berhasil dihapus!');
    }
}
