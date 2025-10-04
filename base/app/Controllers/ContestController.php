<?php 

namespace App\Controllers;

use App\Controller;
use App\Models\Contest;

class ContestController extends Controller {
    private Contest $contest; //khởi tạo object contest từ class Model Contest
    
    public function __construct()
    {
        $this->contest = new Contest();
    }

    public function index() {
        $data = $this->contest->findAll(); //dữ liệu lấy từ db được lưu vào biến $data
    
        return view('admin.contests.list', compact('data')); //trả dữ liệu $data ra giao diện
    }

    public function getDetail($id) {
        $data = $this->contest->findOne($id);

        return view('admin.contests.detail', compact('data'));
    }
}

?>