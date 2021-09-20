<?php

namespace app\Http\Controllers;

use App\Integrations\SiapeWs;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    public function index()
    {
        $this->data['title'] = trans('base.dashboard'); // set the page title
        $this->data['breadcrumbs'] = [
            trans('GeSic') => backpack_url('dashboard'),
            trans('base.dashboard') => false,
        ];

        return view(backpack_view('dashboard'), $this->data);
    }

    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }

    public function testeSiape()
    {
        $siape = new SiapeWs();
        dd($siape->consultaDadosPessoais('','40106'));
        dd($siape->listaServidores('40106','877'));
    }
}
