<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['Kucing', 'Ayam', 'Ikan'];
    
    public function index() {
        $no = 1;
        echo "Menampilkan Data Hewan <br>";
        foreach($this->animals as $animal){
            echo $no++ . ' . ' . $animal. '<br>';
        }
    }

    public function store(Request $request){
        array_push($this->animals, $request->nama);
        echo "Menambahkan Hewan Baru <br>";
        $this->index();
    }

    public function update(Request $request, $id){
        $this->animals[$id] = $request->nama;
        echo "Mengupdate nama hewan - id $id <br>";
        $this->index();
    }
    
    public function destroy($id) {
        unset($this->animals[$id]);
        echo "Menghapus Data hewan - id $id ";
        $this->index();
    }
}