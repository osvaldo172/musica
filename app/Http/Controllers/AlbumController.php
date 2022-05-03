<?php

namespace App\Http\Controllers;

use App\Mail\MarkdownTestMail;
use App\Mail\OrderShipped;
use App\Models\Album;
use App\Models\Cancion;
use App\Providers\MailBoxServiceProvider;
use BeyondCode\Mailbox\Drivers\Log;
use BeyondCode\Mailbox\Facades\Mailbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albumes = Album::all();
        return view('albumes.show', compact('albumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canciones = Cancion::all();
        return view('albumes.create', compact('canciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nombre' => $request->nombre
        ];
        $album = Album::create($data);
        $album->canciones()->sync($request->canciones);
        return redirect()->route('albumes.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $albume)
    {
        $album = Album::with('canciones')->find($albume->id);
        $canciones = Cancion::all();
        return view('albumes.create', compact('album','canciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $albume)
    {
        $albume->nombre = $request->nombre;
        $albume->save();
        $albume->canciones()->sync($request->canciones);
        return redirect()->route('albumes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $albume)
    {
        $albume->delete();
        return redirect()->route('albumes.index');
    }

    public function sendEmail(){
        \Illuminate\Support\Facades\Log::info('hola mundo');

        Mail::to('test@beyondco.de')->send(
            new MarkdownTestMail('This is a test message')
        );
        return "hola mundo";
    }
}
