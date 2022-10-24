<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller{   
    public $animals = ["Kucing","Ayam","Ikan"];
    public function index(){
        echo "Menampilkan data Animal" . "<br>";
        foreach($this->animals as $animal){
            echo "- " . $animal . "<br>";
        }
    }

    public function store(Request $request){
        echo "Menmbahklan data baru" . "<br>";
        $data = $request->only('animal');
        array_push($this->animals, $data['animal']);
        $this->index();
    }

    public function update(Request $request, $id){
        echo "Mengubah Data Hewan index ke " . $id . "<br>";
        $data = $request->only("animal");
        $this->animals[$id] = $data["animal"];
        $this->index();
    }

    public function destroy($id){
        echo "Menghapus data hewan index ke " . $id . "<br>";
        unset($this->animals[$id]);
        $this->index();
    }


}
