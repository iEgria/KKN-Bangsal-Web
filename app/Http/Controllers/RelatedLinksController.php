<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RelatedLinkCreateRequest;
use App\Http\Requests\RelatedLinkUpdateRequest;
use App\Interfaces\RelatedLinkRepository;
use App\Validators\RelatedLinkValidator;

class RelatedLinksController extends Controller
{
    protected $RelatedLink;
    protected $validator;

    public function __construct(RelatedLinkRepository $repository, RelatedLinkValidator $validator)
    {
        $this->RelatedLink = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $this->RelatedLink->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        return response()->json($this->RelatedLink->all());
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $relatedLink = $request->all();
            if ($request->hasFile('logo')) {
                $relatedLink['logo'] = str_replace('public/', '', $request->file('logo')->store('public/logo'));
            }
            $relatedLink = $this->RelatedLink->create($relatedLink);

            return response()->json([
                'message' => 'Related Link created.',
                'data'    => $relatedLink,
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function show($id)
    {
        return response()->json($this->RelatedLink->find($id));
    }

    public function edit($id)
    {
        $relatedLink = $this->RelatedLink->find($id);

        return view('relatedLinks.edit', compact('relatedLink'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $relatedLink = $request->all();
            if ($request->hasFile('logo')) {
                $relatedLink['logo'] = str_replace('public/', '', $request->file('logo')->store('public/logo'));
            }
            $relatedLink = $this->RelatedLink->update($relatedLink, $id);

            return response()->json($relatedLink);
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
        $deleted = $this->RelatedLink->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'RelatedLink deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RelatedLink deleted.');
    }
}
