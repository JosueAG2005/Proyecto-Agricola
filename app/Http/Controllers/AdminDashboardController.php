<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\Maquinaria;
use App\Models\Organico;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {

        $desde = $request->desde;
        $hasta = $request->hasta;
        $tipo  = $request->tipo;

        $qGanado = Ganado::query();
        $qMaquinaria = Maquinaria::query();
        $qOrganicos = Organico::query();

        if ($tipo === 'ganado') {
            $qMaquinaria->whereNull('id');
            $qOrganicos->whereNull('id');
        }
        if ($tipo === 'maquinaria') {
            $qGanado->whereNull('id');
            $qOrganicos->whereNull('id');
        }
        if ($tipo === 'organico') {
            $qGanado->whereNull('id');
            $qMaquinaria->whereNull('id');
        }

        if ($desde) {
            $qGanado->whereDate('created_at', '>=', $desde);
            $qMaquinaria->whereDate('created_at', '>=', $desde);
            $qOrganicos->whereDate('created_at', '>=', $desde);
        }
        if ($hasta) {
            $qGanado->whereDate('created_at', '<=', $hasta);
            $qMaquinaria->whereDate('created_at', '<=', $hasta);
            $qOrganicos->whereDate('created_at', '<=', $hasta);
        }


        $totalGanado     = $qGanado->count();
        $totalMaquinaria = $qMaquinaria->count();
        $totalOrganicos  = $qOrganicos->count();
        $totalPublicaciones = $totalGanado + $totalMaquinaria + $totalOrganicos;


        $hoy = Carbon::today();

        $totalHoy =
            $qGanado->clone()->whereDate('created_at', $hoy)->count() +
            $qMaquinaria->clone()->whereDate('created_at', $hoy)->count() +
            $qOrganicos->clone()->whereDate('created_at', $hoy)->count();

        $totalSemana =
            $qGanado->clone()->where('created_at', '>=', now()->subDays(7))->count() +
            $qMaquinaria->clone()->where('created_at', '>=', now()->subDays(7))->count() +
            $qOrganicos->clone()->where('created_at', '>=', now()->subDays(7))->count();

        $totalMes =
            $qGanado->clone()->whereMonth('created_at', now()->month)->count() +
            $qMaquinaria->clone()->whereMonth('created_at', now()->month)->count() +
            $qOrganicos->clone()->whereMonth('created_at', now()->month)->count();


        if ($totalPublicaciones > 0) {
            $porcentajeGanado     = round(($totalGanado / $totalPublicaciones) * 100, 1);
            $porcentajeMaquinaria = round(($totalMaquinaria / $totalPublicaciones) * 100, 1);
            $porcentajeOrganicos  = round(($totalOrganicos / $totalPublicaciones) * 100, 1);
        } else {
            $porcentajeGanado = $porcentajeMaquinaria = $porcentajeOrganicos = 0;
        }


        $labelsMeses = [];
        $ganadoPorMes = [];
        $maquinariaPorMes = [];
        $organicosPorMes = [];

        for ($i = 5; $i >= 0; $i--) {
            $fecha = Carbon::now()->subMonths($i);
            $mes = $fecha->format('Y-m');

            $labelsMeses[] = $fecha->translatedFormat('M Y');

            $ganadoPorMes[] = Ganado::whereRaw("TO_CHAR(created_at, 'YYYY-MM') = ?", [$mes])->count();
            $maquinariaPorMes[] = Maquinaria::whereRaw("TO_CHAR(created_at, 'YYYY-MM') = ?", [$mes])->count();
            $organicosPorMes[] = Organico::whereRaw("TO_CHAR(created_at, 'YYYY-MM') = ?", [$mes])->count();
        }



        $semanaAnterior =
            Ganado::whereBetween('created_at', [now()->subDays(14), now()->subDays(7)])->count() +
            Maquinaria::whereBetween('created_at', [now()->subDays(14), now()->subDays(7)])->count() +
            Organico::whereBetween('created_at', [now()->subDays(14), now()->subDays(7)])->count();

        $variacionSemanaPorcentaje = $semanaAnterior > 0
            ? (($totalSemana - $semanaAnterior) / $semanaAnterior) * 100
            : 0;

        $mesAnterior =
            Ganado::whereMonth('created_at', now()->subMonth()->month)->count() +
            Maquinaria::whereMonth('created_at', now()->subMonth()->month)->count() +
            Organico::whereMonth('created_at', now()->subMonth()->month)->count();

        $variacionMesPorcentaje = $mesAnterior > 0
            ? (($totalMes - $mesAnterior) / $mesAnterior) * 100
            : 0;

        $diasTranscurridos = now()->day;
        $promedioPublicacionesDiaMes = $diasTranscurridos > 0
            ? $totalMes / $diasTranscurridos
            : 0;


        $totalVendedoresActivos = User::where(function ($q) {
            $q->whereHas('ganados', fn($qq) => $qq->where('created_at', '>=', now()->subDays(30)));
        })
            ->orWhere(function ($q) {
                $q->whereHas('maquinarias', fn($qq) => $qq->where('created_at', '>=', now()->subDays(30)));
            })
            ->orWhere(function ($q) {
                $q->whereHas('organicos', fn($qq) => $qq->where('created_at', '>=', now()->subDays(30)));
            })
            ->count();

        return view('admin.dashboard', compact(
            'totalGanado',
            'totalMaquinaria',
            'totalOrganicos',
            'totalPublicaciones',
            'totalHoy',
            'totalSemana',
            'totalMes',
            'porcentajeGanado',
            'porcentajeMaquinaria',
            'porcentajeOrganicos',
            'labelsMeses',
            'ganadoPorMes',
            'maquinariaPorMes',
            'organicosPorMes',
            'variacionSemanaPorcentaje',
            'variacionMesPorcentaje',
            'promedioPublicacionesDiaMes',
            'totalVendedoresActivos',
            'desde',
            'hasta',
            'tipo'
        ));
    }
}
