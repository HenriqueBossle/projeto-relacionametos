<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('client.index', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect('clients')->with('success', 'Client created successfully.');
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
