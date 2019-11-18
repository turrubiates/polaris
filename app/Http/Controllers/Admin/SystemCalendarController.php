<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\App\\ListaDeEvento',
            'date_field' => 'inicio_de_evento',
            'field'      => 'nombre_de_evento',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.lista-de-eventos.edit',
        ],
        [
            'model'      => '\\App\\User',
            'date_field' => 'vigencia',
            'field'      => 'cum',
            'prefix'     => 'Vencimiento de',
            'suffix'     => '',
            'route'      => 'admin.users.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
