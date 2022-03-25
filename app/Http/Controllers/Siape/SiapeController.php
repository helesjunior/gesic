<?php


namespace App\Http\Controllers\Siape;


use App\Integrations\SiapeWs;
use App\Models\Siorg;
use App\Models\Unit;
use App\Models\Uorg;

class SiapeController
{

    protected $organ;

    public function __construct(string $organ)
    {
        $this->organ = $organ;
    }


    public function execFunctionByName(string $functionName, array $data = [])
    {
        $return = $this->$functionName($data);

        $insertFunction = $this->getFunctionByName($functionName);

        $insert = $this->$insertFunction($return);

        return $insert;

    }


    private function insertUorgs(array $return)
    {
        foreach ($return as $uorg) {
            $details_uorg = $this->getUorgDetails($uorg['code']);
            $uorg_model = new Uorg();
            $insert_uorg = $uorg_model->firstOrCreateUorg($details_uorg);
            dump($insert_uorg->id);
            sleep(1);
        }
        dd('Fim');
        return true;
    }

    private function getFunctionByName($functionName)
    {
        $return = '';

        switch ($functionName) {
            case 'getUorgsByOrgan':
                $return = 'insertUorgs';
                break;
        }
        return $return;

    }

    private function getUorgsByOrgan($data = [])
    {
        $siapeWS = new SiapeWs();

        if (isset($data['uorg'])) {
            $uorgs = $siapeWS->listaUorgs($this->organ, $data['uorg']);
        } else {
            $uorgs = $siapeWS->listaUorgs($this->organ, '');
        }

        $return = [];
        foreach ($uorgs->out->Uorg as $uorg) {
            $return[] = [
                'code' => (string)$uorg->codigo,
                'description' => mb_strtoupper((string)$uorg->nome, 'UTF-8')
            ];
        }

        return $return;
    }

    public function getUorgDetails(string $uorg_code)
    {
        $siapeWS = new SiapeWs();

        $return = [];

        if (!$uorg_code) {
            return [];
        }

        $uorg_details = $siapeWS->dadosUorg($this->organ, $uorg_code);

        $siorg = new Siorg();
        $uorg = new Uorg();
        $unit = new Unit();

        $return = [
            'siorg_id' => $siorg->getIdByCode((int)$uorg_details->out->codSiorg),
            'father_id' => $uorg->getIdByCode((int)$uorg_details->out->codUorgPai),
            'unit_id' => $unit->getIdByCode((int)$uorg_details->out->codUnidadeSiafi),
            'code' => $uorg_code,
            'short_description' => mb_strtoupper($uorg_details->out->siglaUorg, 'UTF-8'),
            'description' => mb_strtoupper($uorg_details->out->nomeUorg, 'UTF-8'),
        ];

        return $return;
    }


}
