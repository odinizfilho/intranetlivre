<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Category;
use App\Models\ReportLog;
use App\Exports\ReportLogsExport;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('reports.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|url',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $report = Report::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        $report->categories()->attach($request->input('categories'));

        return redirect()->route('reports.show', $report)->with('success', 'Relatório criado com sucesso!');
    }

    public function share(Request $request, Report $report)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->route('reports.show', $report)->with('error', 'O e-mail não faz parte da plataforma. Gentileza realizar cadastro.');
        }

        if ($report->users()->where('id', $user->id)->exists()) {
            return redirect()->route('reports.show', $report)->with('error', 'Este relatório já foi compartilhado com o usuário do e-mail informado.');
        }

        $report->users()->attach($user);

        return redirect()->route('reports.show', $report)->with('success', 'Relatório compartilhado com sucesso!');
    }

    public function sharedReports()
    {
        $user = auth()->user();
        $sharedReports = $user->sharedReports;
        return view('reports.shared', compact('sharedReports'));
    }

    public function destroy(Report $report)
    {
        if ($report->user_id !== auth()->user()->id) {
            return redirect()->route('reports.index')->with('error', 'Você não tem permissão para excluir este relatório.');
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Relatório excluído com sucesso!');
    }

    public function revertShare(Request $request, Report $report, User $user)
    {
        $report->users()->detach($user);

        return redirect()->route('reports.showShares', $report)->with('success', 'Compartilhamento revertido com sucesso!');
    }

    public function showShares(Report $report)
    {
        if ($report->user_id !== auth()->user()->id) {
            return redirect()->route('reports.index')->with('error', 'Você não tem permissão para visualizar os compartilhamentos deste relatório.');
        }

        $sharedUsers = $report->users;

        return view('reports.shares', compact('report', 'sharedUsers'));
    }

    public function edit(Report $report)
    {
        $categories = Category::all();
        $reportCategories = $report->categories->pluck('id')->toArray();

        return view('reports.edit', compact('report', 'categories', 'reportCategories'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|url',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $report->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $report->categories()->sync($request->input('categories'));

        return redirect()->route('reports.show', $report)->with('success', 'Relatório atualizado com sucesso!');
    }

    public function showLogs(Report $report)
{
    if ($report->user_id !== auth()->user()->id) {
        return redirect()->route('reports.index')->with('error', 'Você não tem permissão para visualizar os logs deste relatório.');
    }

    $logs = ReportLog::where('report_id', $report->id)->get();

    return view('reports.logs', compact('report', 'logs'));
}

public function exportLogs(Report $report)
{
    if ($report->user_id !== auth()->user()->id) {
        return redirect()->route('reports.index')->with('error', 'Você não tem permissão para exportar os logs deste relatório.');
    }

    $logs = ReportLog::where('report_id', $report->id)->get();

    $logIds = $logs->pluck('id')->toArray(); // Extrai apenas os IDs dos logs

    $export = new ReportLogsExport($logIds); // Passa os IDs dos logs para a classe de exportação

    return $export->exportToCsvFile();
}

}
