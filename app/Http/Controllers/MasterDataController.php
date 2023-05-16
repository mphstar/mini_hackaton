<?php

namespace App\Http\Controllers;

use App\Models\master\ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MasterDataController extends Controller
{
    public function update($id)
    {
        $data = ikan::where('id', '=', $id)->first();

        return view('admin.create', compact('data'));
    }

    public function data()
    {

        $data = ikan::orderBy('created_at', 'desc')->paginate(6);

        return view('admin.dashboard', compact('data'));
    }

    public function search_data(Request $request)
    {
        $data = ikan::where('nama_ikan', 'LIKE', '%' . $request->get('nama') . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // TODO: Menyisipkan parameter nama pada url
        $data->appends(array(
            'nama' => $request->get('nama')
        ));

        return view('admin.dashboard', compact('data'));
    }

    public function proses_create(Request $request)
    {
        // TODO: Proses validasi
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'stok' => 'required|int|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('gambar');
        $tujuan_file = 'gambar_ikan';
        $file->move($tujuan_file, $file->getClientOriginalName());

        $data = new ikan;
        $data->nama_ikan = $request->nama;
        $data->stok = $request->stok;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $file->getClientOriginalName();
        $data->save();




        return redirect()->route('admin.dashboard')->with('success', 'Berhasil menambahkan data');
    }

    public function proses_update(Request $request)
    {

        if ($request->gambar) {
            // TODO: Proses validasi
            $this->validate($request, [
                'nama' => 'required|string|max:255',
                'stok' => 'required|int|max:255',
                'deskripsi' => 'required',
                'gambar' => 'required|mimes:png,jpg,jpeg',
            ]);


            $file = $request->file('gambar');
            $tujuan_file = 'gambar_ikan';
            $file->move($tujuan_file, $file->getClientOriginalName());

            // find digunakan untuk mencari data berdasarkan primary key nya
            $data = ikan::find($request->id);
            if (File::exists("gambar_ikan/" . $data->gambar)) {
                File::delete("gambar_ikan/" . $data->gambar);
            }

            ikan::where('Id', $request->id)->update([
                'nama_ikan' => $request->nama,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                'gambar' => $file->getClientOriginalName(),
            ]);
        }

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'stok' => 'required|int|max:255',
            'deskripsi' => 'required',
        ]);

        ikan::where('Id', $request->id)->update([
            'nama_ikan' => $request->nama,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);




        return redirect()->route('admin.dashboard')->with('success', 'Berhasil mengubah data');
    }

    public function proses_delete($id)
    {
        //  find digunakan untuk mencari data berdasarkan primary key nya
        $data = ikan::find($id);
        $data->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Berhasil menghapus data');
    }
}
