<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('clients.index', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
    
        Client::create($data);
    
        return redirect()->route('clients.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function edit($id)
    {
        $Client = Client::findOrFail($id);
        return view('clients.edit', compact('Client'));
    }

    public function update(Request $request, $id)
    {
        $Client = Client::findOrFail($id);
        $Client->update($request->all());
        return redirect('clients')->with('success', 'clients updated successfully.');
    }

    public function destroy($id)
    {
        $Client = Client::findOrFail($id);
        $Client->delete();
        return redirect('clients')->with('success', 'Client deleted successfully.');
    }
}
