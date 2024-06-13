<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kosts = Kost::with('rooms')->get();
        return view('admin.index', compact('kosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
            'room_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('image');

        if ($file != null) {
            $original_photoname = $file->getClientOriginalName();
            $encrypted_photoname = $file->hashName();

            // Store File
            $file->store('public/files/DocumentPhotoKost');
            $file->move('resources/images/photoKost', $original_photoname);
        }

        // ELOQUENT
        $kost = new Kost;
        $kost->name = $request->name;
        $kost->address = $request->address;
        $kost->description = $request->description;

        if ($file != null) {
            $kost->original_photoname = $original_photoname;
            $kost->encrypted_photoname = $encrypted_photoname;
        }
        $kost->save();

        // ELOQUENT ROOM
        if ($request->filled('room_name')) {
            $room = new Room();
            $room->room_name = $request->room_name;
            $room->price = $request->price;
            $room->availability = $request->availability;
            $room->description = $request->description;
            $room->kost_id = $kost->id;
            $room->save();
        }
        Alert::success('Berhasil Menambahkan', 'Data Kos Berhasil Ditambahkan.');

        return redirect()->route('dashboard-admin.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kost = Kost::with('rooms')->find($id);
        return view('admin.edit', compact('kost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'room_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the Kost record
        $kost = Kost::find($id);


        $file = $request->file('image');
        if ($file != null) {
            $original_photoname = $file->getClientOriginalName();
            $encrypted_photoname = $file->hashName();

            // Store File
            $file->store('public/files/DocumentPhotoKost');
            $file->move('resources/images/photoKost', $original_photoname);

            // Update file names in the database
            $kost->original_photoname = $original_photoname;
            $kost->encrypted_photoname = $encrypted_photoname;
        }

        //update kos
        $kost->name = $request->name;
        $kost->address = $request->address;
        $kost->description = $request->description;
        $kost->save();

        // update or new
        $room = Room::where('kost_id', $kost->id)->first();
        if (!$room) {
            $room = new Room();
            $room->kost_id = $kost->id;
        }
        $room->room_name = $request->room_name;
        $room->price = $request->price;
        $room->availability = $request->availability;
        $room->description = $request->room_description;
        $room->save();
        Alert::success('Edit Berhasil', 'Data Kos Berhasil di Edit.');
        return redirect()->route('dashboard-admin.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kost = Kost::find($id);
        $kost->delete();
        Alert::success('Hapus Berhasil', 'Data Sudah Terhapus.');
        return redirect()->route('dashboard-admin.index');
    }


    public function downloadPDF($id)
    {
        $kost = Kost::with('rooms')->find($id);
        $pdf = PDF::loadView('admin.pdf', compact('kost'));
        return $pdf->download('kost_details.pdf');
    }

    public function showUser()
    {
        $user = User::all();
        return view('admin.daftarUser', compact('user'));
    }

    public function exportUser( )
    {
        $user = User::all();
        $pdf = PDF::loadView('admin.exportUserPdf', compact('user'));
        return $pdf->download('user.pdf');
    }

    public function getData(Request $request)
    {

    }
}
