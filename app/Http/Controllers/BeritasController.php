<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BeritaCreateRequest;
use App\Http\Requests\BeritaUpdateRequest;
use App\Interfaces\BeritaRepository;
use App\Validators\BeritaValidator;
use Illuminate\Support\Str;

class BeritasController extends Controller
{
    protected $Berita;
    protected $validator;

    public function __construct(BeritaRepository $beritaRepository, BeritaValidator $validator)
    {
        $this->Berita = $beritaRepository;
        $this->validator  = $validator;
    }

    public function index(Request $request)
    {
        $this->Berita->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        if ($request->popular) {
            return response()->json($this->Berita->orderBy('view', 'desc')->take(3)->get());
        } else {
            return response()->json($this->Berita->orderBy('published_at', 'desc')->all());
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $Berita = $request->all();
            if ($request->hasFile('cover')) {
                $Berita['cover'] = str_replace('public/', '', $request->file('cover')->store('public/cover'));
            }
            $Berita['slug'] = Str::slug($request->title);
            $Berita = $this->Berita->create($Berita);

            return response()->json([
                'message' => 'Related Link created.',
                'data'    => $Berita,
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function show($slug)
    {
        $berita = $this->Berita->where(['slug' => $slug])->first();
        $this->Berita->update(['view' => $berita->view + 1], $berita->id);
        return response()->json($this->Berita->findByField('slug', $slug));
    }

    public function edit($id)
    {
        return response()->json($this->Berita->find($id));
    }

    public function update(Request $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $berita = $request->all();
            if ($request->hasFile('logo')) {
                $berita['logo'] = str_replace('public/', '', $request->file('logo')->store('public/logo'));
            }
            $berita['slug'] = Str::slug($request->title);
            $berita = $this->Berita->update($berita, $id);

            return response()->json($berita);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->Berita->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Berita deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Berita deleted.');
    }
}
