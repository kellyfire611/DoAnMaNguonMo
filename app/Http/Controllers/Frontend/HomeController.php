<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\DiaDiem\ManageDiaDiemRequest;
use App\Models\DiaDiem;
use App\Models\DichVu;
use App\Models\DiaChi;
use App\Models\TinhThanh;
use App\Models\QuanHuyen;
use App\Models\XaPhuong;
use App\Models\QuangCao;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\DiaDiemRepository;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @var DiaDiemRepository
     */
    protected $DiaDiemRepository;

    /**
     * DiaDiemController constructor.
     *
     * @param DiaDiemRepository $DiaDiemRepository
     */
    public function __construct(DiaDiemRepository $DiaDiemRepository)
    {
        $this->DiaDiemRepository = $DiaDiemRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $diadiems = DiaDiem::take(12)->get();
        $topmonans = DiaDiem::all();
        $quangcaos = QuangCao::all();

        return view('frontend.index')
            ->with('diadiems', $diadiems)
            ->with('topmonans', $topmonans)
            ->with('quangcaos', $quangcaos);
    }

    public function search(Request $request)
    {
        $inputs = $request->only(
            'type_search',
            'keyword'
        );

        $inputs['keyword'] = trim($inputs['keyword']);
        $diadiems = $this->DiaDiemRepository->search($inputs);
        return view('frontend.search')
            ->with('diadiems', $diadiems)
            ->with('inputs', $inputs);
    }
}
