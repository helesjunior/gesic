<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Siape\SiapeController;
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
        $teste = new SiapeController('40106');
        $teste->execFunctionByName('getUorgsByOrgan');

//        $data = $siape->listaServidores('40106', '877');
//        $return = $siape->consultaDadosPessoais('70074402153','40106');
//        foreach ($data->out->Servidor as $servidor) {
//            $data_servidore = $siape->consultaDadosPessoais($servidor->cpf,'40106');
//            dump((is_object($data_servidore->out->nomeDefFisica))?'':$data_servidore->out->nomeDefFisica);
//        }

    }
}
