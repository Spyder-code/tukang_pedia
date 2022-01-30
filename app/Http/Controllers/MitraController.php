<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Repositories\MitraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    private $mitraService;

    public function __construct(MitraService $mitraService)
    {
        $this->mitraService = $mitraService;
    }


    public function index()
    {
        $data = $this->mitraService->all();
        return view('admin.mitra.index', compact('data'));
    }


    public function create()
    {
        return view('admin.mitra.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|max:10000|mimes:pdf',
            'file' => 'required|max:10000|mimes:pdf',
            'avatar' => 'required|max:10000|mimes:jpg,png,jpeg'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['cv'] = $this->mitraService->insertFile($request->cv,Auth::id());
        $data['file'] = $this->mitraService->insertFile($request->file,Auth::id());
        $data['avatar'] = $this->mitraService->insertFile($request->avatar,Auth::id());
        $this->mitraService->store($data);
        return redirect()->route('transaction.index')->with('success','Mitra has registered');
    }


    public function show(Mitra $mitra)
    {
        return view('admin.mitra.show', compact('mitra'));
    }


    public function edit(Mitra $mitra)
    {
        return view('admin.mitra.edit', compact('mitra'));
    }


    public function update(Request $request, Mitra $mitra)
    {
        $this->mitraService->update($request->all(),$mitra->id);
        return redirect()->route('mitra.index')->with('success','Mitra has success updated');
    }


    public function destroy(Mitra $mitra)
    {
        $this->mitraService->destroy($mitra->id);
        return redirect()->route('mitra.index')->with('success','Mitra has success deleted');
    }
}
