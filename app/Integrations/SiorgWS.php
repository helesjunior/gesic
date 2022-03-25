<?php
/**
 * @Documentation https://api.siorg.economia.gov.br/
 * @Url https://estruturaorganizacional.dados.gov.br/doc/unidade-organizacional/46/estrutura.json
 * @url https://estruturaorganizacional.dados.gov.br/doc/unidade-organizacional/{id}/completa.json
 * @author Heles R. Silva Júnior <helesjunior@gmail.com>
 */

namespace App\Integrations;


use App\Models\Siorg;

class SiorgWS
{
    protected $url_servico;

    public function __construct()
    {
        $this->url_servico = config('api-siorg.url');
    }

    public function index($organ_code, $organ_id = null)
    {
        $organ_data = $this->getStructureOrgan($organ_code);

        $data_master = $this->getDataUnit($organ_data->estrutura->codigoUnidade);

        $siorg_master = $this->insertUpdateSiorg($data_master, $organ_data->estrutura->codigoUnidade, null, $organ_id);

        $count = is_array($organ_data->estrutura->estrutura) ? count($organ_data->estrutura->estrutura) : 0;
        if ($count > 0) {
            foreach ($organ_data->estrutura->estrutura as $units) {
                $data_unit = $this->getDataUnit($units->codigoUnidade);
                $siorg_new = $this->insertUpdateSiorg($data_unit, $units->codigoUnidade, $siorg_master->id, $organ_id);
                $this->arrayInsertUnits($units->estrutura, $organ_id, $siorg_new->id);
            }
        }

    }

    private function arrayInsertUnits($array, $organ_id, $father_id = null)
    {
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            $data = $array[$i];
            $data_unit = $this->getDataUnit($data->codigoUnidade);
            $siorg_new = $this->insertUpdateSiorg($data_unit, $data->codigoUnidade, $father_id, $organ_id);
            $count2 = is_array($data->estrutura) ? count($data->estrutura) : 0;
            if ($count2 > 0) {
                foreach ($data->estrutura as $units) {
                    $data_unit2 = $this->getDataUnit($units->codigoUnidade);
                    $siorg_new2 = $this->insertUpdateSiorg($data_unit2, $units->codigoUnidade, $siorg_new->id, $organ_id);
                    $this->arrayInsertUnits($units->estrutura, $organ_id, $siorg_new2->id);
                }
            }
        }
    }

    private function getStructureOrgan($organ_code)
    {
        $url = $this->url_servico . $organ_code . '/estrutura.json';

        $data = json_decode(file_get_contents($url));

        return $data;

    }

    private function getDataUnit($unit_code)
    {
        $url = $this->url_servico . $unit_code . '/resumida.json';

        $data = json_decode(file_get_contents($url));

        return $data;

    }

    private function insertUpdateSiorg($unit, $code, $father_id = null, $organ_id = null)
    {
        $data = [
            'organ_id' => $organ_id,
            'father_id' => $father_id,
            'code' => $code,
        ];

        $data1 = [
            'short_description' => @$unit->unidade->sigla,
            'description' => @$unit->unidade->nome,
            'status' => true
        ];

        $siorg_unit = Siorg::updateOrCreate(
            $data,
            $data1
        );

        return $siorg_unit;
    }

}
