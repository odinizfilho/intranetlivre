<?php 
namespace App\Exports;

use League\Csv\Writer;
use SplTempFileObject;
use App\Models\ReportLog;

class ReportLogsExport
{
    protected $reportId;

    public function __construct($reportId)
    {
        $this->reportId = $reportId;
    }

    public function query()
    {
        return ReportLog::query()->where('report_id', $this->reportId);
    }

    public function exportToCsvFile()
    {
        $records = $this->query()->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());

        $csv->insertOne(['id', 'user_id', 'report_id', 'accessed_at', 'created_at', 'updated_at']); // Insira os cabeçalhos das colunas desejadas

        foreach ($records as $record) {
            $csv->insertOne([$record->id, $record->user_id, $record->report_id, $record->accessed_at, $record->created_at, $record->updated_at]); // Insira os valores das colunas desejadas
        }

        $csv->output('report_logs.csv');
        exit; // Adicione esta linha para finalizar a execução após a exportação
    }
}
