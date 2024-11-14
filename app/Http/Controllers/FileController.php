<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $files = File::all();
        return view('files.index-file', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = File::all();
        return view('files.index-file', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('file') && $request->file('file')->isValid()){
            /*GUARDA EL ARCHIVO EN EL SISTEMA DE ARCHIVOS PERO
            NO GENERA EL REGISTRO EN LA BASE DE DATOS*/
            $path = $request->file->store('documents');


            //CREAR REGISTRO EN LA TABLA FILES
            $file = new File();
            $file->path = $path;
            $file->orgName = $request->file->getClientOriginalName();
            $file->mime = $request->file->getMimeType();
            $file->save();
        }

        return redirect()->route('file.index');
    }

    /**
     * Display the specified resource.
     */
    public function download(File $file)
    {
        return Storage::download($file->path, $file->orgName, ['Content-Type' => $file->mime]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
