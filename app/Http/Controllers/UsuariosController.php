<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index() {
        $usuariosList = Usuarios::all();
        return view('usuarios.all', ['usuariosList'=>$usuariosList]);
    }

    public function show($id) {
        $p = Usuarios::find($id);
        $data['usuarios'] = $p;
        return view('usuarios.show', $data);
    }

    public function create() {
        return view('usuarios.form');
    }

    public function store(Request $r) {
        $p = new Usuarios();
        $p->name = $r->name;
        $p->user = $r->user;
        $p->password = $r->password;
        $p->save();
        return redirect()->route('usuarios.index');
    }

    public function edit($id) {
        $usuarios = Usuarios::find($id);
        return view('usuarios.form', array('usuario' => $usuarios));
    }

    public function update($id, Request $r) {
        $p = Usuarios::find($id);
        $p->name = $r->name;
        $p->user = $r->user;
        $p->password = $r->password;
        $p->save();
        return redirect()->route('usuarios.index');
    }

    public function destroy($id) {
        $p = Usuarios::find($id);
        $p->delete();
        return redirect()->route('usuarios.index');
}
}