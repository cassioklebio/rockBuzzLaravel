<?php

namespace App\Http\Controllers;


use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    //
    private $tag;

    public function __construct(Tag $tag)
    {

        $this->tag = $tag;
    }

    public function show($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaBreadCrumb = json_encode([
            ["titulo" => "Home", "url" => route('home')],
            ["titulo" => "Lista de Tags", "url" => ""]
        ]);
        $tags = $this->tag->paginate(10);
        return view('tags.index', compact('tags', 'listaBreadCrumb'));
    }

    public function create()
    {
        return view('tags.create');
    }

    /**
     *
     *
     * @param  \Illuminate\Http\TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $data = $request->all();

        $tag = $this->tag->create($data);
        return redirect()->route('tags.index');
    }


    /**
     *
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {
        $tag = $this->tag->findOrFail($tag);

        return view('tag.edit', compact('tag'));
    }


    /**
     * Update the specified resource in tag.
     *
     * @param  \Illuminate\Http\TagRequest  $request
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $tag)
    {
        $data = $request->all();

        $tag = $this->tag->find($tag);

        $tag->update($data);


        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        $tag = $this->tag->find($tag);
        $tag->delete();


        redirect()->route('tags');
    }
}
