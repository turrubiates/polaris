<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_access',
            ],
            [
                'id'    => '16',
                'title' => 'team_create',
            ],
            [
                'id'    => '17',
                'title' => 'team_edit',
            ],
            [
                'id'    => '18',
                'title' => 'team_show',
            ],
            [
                'id'    => '19',
                'title' => 'team_delete',
            ],
            [
                'id'    => '20',
                'title' => 'team_access',
            ],
            [
                'id'    => '21',
                'title' => 'administrador_access',
            ],
            [
                'id'    => '22',
                'title' => 'provincium_create',
            ],
            [
                'id'    => '23',
                'title' => 'provincium_edit',
            ],
            [
                'id'    => '24',
                'title' => 'provincium_show',
            ],
            [
                'id'    => '25',
                'title' => 'provincium_delete',
            ],
            [
                'id'    => '26',
                'title' => 'provincium_access',
            ],
            [
                'id'    => '27',
                'title' => 'grupo_create',
            ],
            [
                'id'    => '28',
                'title' => 'grupo_edit',
            ],
            [
                'id'    => '29',
                'title' => 'grupo_show',
            ],
            [
                'id'    => '30',
                'title' => 'grupo_delete',
            ],
            [
                'id'    => '31',
                'title' => 'grupo_access',
            ],
            [
                'id'    => '32',
                'title' => 'regnal_create',
            ],
            [
                'id'    => '33',
                'title' => 'regnal_edit',
            ],
            [
                'id'    => '34',
                'title' => 'regnal_show',
            ],
            [
                'id'    => '35',
                'title' => 'regnal_delete',
            ],
            [
                'id'    => '36',
                'title' => 'regnal_access',
            ],
            [
                'id'    => '37',
                'title' => 'evento_access',
            ],
            [
                'id'    => '38',
                'title' => 'lista_de_evento_create',
            ],
            [
                'id'    => '39',
                'title' => 'lista_de_evento_edit',
            ],
            [
                'id'    => '40',
                'title' => 'lista_de_evento_show',
            ],
            [
                'id'    => '41',
                'title' => 'lista_de_evento_delete',
            ],
            [
                'id'    => '42',
                'title' => 'lista_de_evento_access',
            ],
            [
                'id'    => '43',
                'title' => 'registro_evento_create',
            ],
            [
                'id'    => '44',
                'title' => 'registro_evento_edit',
            ],
            [
                'id'    => '45',
                'title' => 'registro_evento_show',
            ],
            [
                'id'    => '46',
                'title' => 'registro_evento_delete',
            ],
            [
                'id'    => '47',
                'title' => 'registro_evento_access',
            ],
            [
                'id'    => '48',
                'title' => 'ficha_medica_create',
            ],
            [
                'id'    => '49',
                'title' => 'ficha_medica_edit',
            ],
            [
                'id'    => '50',
                'title' => 'ficha_medica_show',
            ],
            [
                'id'    => '51',
                'title' => 'ficha_medica_access',
            ],
            [
                'id'    => '52',
                'title' => 'finanzas_de_provincium_access',
            ],
            [
                'id'    => '53',
                'title' => 'control_de_cheque_create',
            ],
            [
                'id'    => '54',
                'title' => 'control_de_cheque_edit',
            ],
            [
                'id'    => '55',
                'title' => 'control_de_cheque_show',
            ],
            [
                'id'    => '56',
                'title' => 'control_de_cheque_delete',
            ],
            [
                'id'    => '57',
                'title' => 'control_de_cheque_access',
            ],
            [
                'id'    => '58',
                'title' => 'movimientos_bancario_create',
            ],
            [
                'id'    => '59',
                'title' => 'movimientos_bancario_edit',
            ],
            [
                'id'    => '60',
                'title' => 'movimientos_bancario_show',
            ],
            [
                'id'    => '61',
                'title' => 'movimientos_bancario_delete',
            ],
            [
                'id'    => '62',
                'title' => 'movimientos_bancario_access',
            ],
            [
                'id'    => '63',
                'title' => 'control_de_gasto_create',
            ],
            [
                'id'    => '64',
                'title' => 'control_de_gasto_edit',
            ],
            [
                'id'    => '65',
                'title' => 'control_de_gasto_show',
            ],
            [
                'id'    => '66',
                'title' => 'control_de_gasto_delete',
            ],
            [
                'id'    => '67',
                'title' => 'control_de_gasto_access',
            ],
            [
                'id'    => '68',
                'title' => 'indicadore_access',
            ],
            [
                'id'    => '69',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '70',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '71',
                'title' => 'presupuesto_anual_create',
            ],
            [
                'id'    => '72',
                'title' => 'presupuesto_anual_edit',
            ],
            [
                'id'    => '73',
                'title' => 'presupuesto_anual_show',
            ],
            [
                'id'    => '74',
                'title' => 'presupuesto_anual_delete',
            ],
            [
                'id'    => '75',
                'title' => 'presupuesto_anual_access',
            ],
            [
                'id'    => '76',
                'title' => 'actas_de_provincium_access',
            ],
            [
                'id'    => '77',
                'title' => 'actas_cep_create',
            ],
            [
                'id'    => '78',
                'title' => 'actas_cep_edit',
            ],
            [
                'id'    => '79',
                'title' => 'actas_cep_show',
            ],
            [
                'id'    => '80',
                'title' => 'actas_cep_delete',
            ],
            [
                'id'    => '81',
                'title' => 'actas_cep_access',
            ],
            [
                'id'    => '82',
                'title' => 'acuerdos_cep_create',
            ],
            [
                'id'    => '83',
                'title' => 'acuerdos_cep_edit',
            ],
            [
                'id'    => '84',
                'title' => 'acuerdos_cep_show',
            ],
            [
                'id'    => '85',
                'title' => 'acuerdos_cep_delete',
            ],
            [
                'id'    => '86',
                'title' => 'acuerdos_cep_access',
            ],
            [
                'id'    => '87',
                'title' => 'actas_de_grupo_access',
            ],
            [
                'id'    => '88',
                'title' => 'etiquetas_acuerdos_de_provincium_create',
            ],
            [
                'id'    => '89',
                'title' => 'etiquetas_acuerdos_de_provincium_edit',
            ],
            [
                'id'    => '90',
                'title' => 'etiquetas_acuerdos_de_provincium_show',
            ],
            [
                'id'    => '91',
                'title' => 'etiquetas_acuerdos_de_provincium_delete',
            ],
            [
                'id'    => '92',
                'title' => 'etiquetas_acuerdos_de_provincium_access',
            ],
            [
                'id'    => '93',
                'title' => 'actas_de_cop_create',
            ],
            [
                'id'    => '94',
                'title' => 'actas_de_cop_edit',
            ],
            [
                'id'    => '95',
                'title' => 'actas_de_cop_show',
            ],
            [
                'id'    => '96',
                'title' => 'actas_de_cop_delete',
            ],
            [
                'id'    => '97',
                'title' => 'actas_de_cop_access',
            ],
            [
                'id'    => '98',
                'title' => 'acuerdos_cop_create',
            ],
            [
                'id'    => '99',
                'title' => 'acuerdos_cop_edit',
            ],
            [
                'id'    => '100',
                'title' => 'acuerdos_cop_show',
            ],
            [
                'id'    => '101',
                'title' => 'acuerdos_cop_delete',
            ],
            [
                'id'    => '102',
                'title' => 'acuerdos_cop_access',
            ],
            [
                'id'    => '103',
                'title' => 'actas_cog_create',
            ],
            [
                'id'    => '104',
                'title' => 'actas_cog_edit',
            ],
            [
                'id'    => '105',
                'title' => 'actas_cog_show',
            ],
            [
                'id'    => '106',
                'title' => 'actas_cog_delete',
            ],
            [
                'id'    => '107',
                'title' => 'actas_cog_access',
            ],
            [
                'id'    => '108',
                'title' => 'acuerdos_cog_create',
            ],
            [
                'id'    => '109',
                'title' => 'acuerdos_cog_edit',
            ],
            [
                'id'    => '110',
                'title' => 'acuerdos_cog_show',
            ],
            [
                'id'    => '111',
                'title' => 'acuerdos_cog_delete',
            ],
            [
                'id'    => '112',
                'title' => 'acuerdos_cog_access',
            ],
            [
                'id'    => '113',
                'title' => 'solicitud_de_cambio_de_grupo_create',
            ],
            [
                'id'    => '114',
                'title' => 'solicitud_de_cambio_de_grupo_edit',
            ],
            [
                'id'    => '115',
                'title' => 'solicitud_de_cambio_de_grupo_show',
            ],
            [
                'id'    => '116',
                'title' => 'solicitud_de_cambio_de_grupo_delete',
            ],
            [
                'id'    => '117',
                'title' => 'solicitud_de_cambio_de_grupo_access',
            ],
            [
                'id'    => '118',
                'title' => 'guia_de_acm_create',
            ],
            [
                'id'    => '119',
                'title' => 'guia_de_acm_edit',
            ],
            [
                'id'    => '120',
                'title' => 'guia_de_acm_show',
            ],
            [
                'id'    => '121',
                'title' => 'guia_de_acm_delete',
            ],
            [
                'id'    => '122',
                'title' => 'guia_de_acm_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
