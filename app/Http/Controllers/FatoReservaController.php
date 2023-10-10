<?php
namespace App\Http\Controllers;

use App\Models\FatoReserva;
use App\Models\DSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FatoReservaController extends Controller
{
    public function index()
    {
        // Use o método all() para carregar todas as reservas
        $reservas = FatoReserva::all();

        // Passe as reservas para a view 'reservas.index'
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Use o método all() para carregar todas as salas
        $salas = DSala::all();

        // Passe as salas para a view 'reservas.create'
        return view('reservas.create', compact('salas'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required|integer',
            'data_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i|after:hora_inicio',
        ]);
    
        // Obtenha todos os horários entre a hora de início e a hora de fim
        $horarios = [];
        $horaAtual = $request->input('hora_inicio');
        while ($horaAtual < $request->input('hora_fim')) {
            $horarios[] = $horaAtual;
            $horaAtual = date('H:i', strtotime($horaAtual . ' + 1 minute'));
        }
    
        try {
            DB::beginTransaction();
    
            // Verifique a disponibilidade da sala para cada intervalo de tempo
            foreach ($horarios as $horario) {
                $conflito = FatoReserva::where('sala_id', $request->input('sala_id'))
                    ->where('data_reserva', $request->input('data_reserva'))
                    ->where('hora_inicio', '<=', $horario)
                    ->where('hora_fim', '>', $horario)
                    ->first();
    
                if ($conflito) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Sala já reservada para este horário.');
                }
            }
    
            // Se não houver conflitos, crie a reserva
            $reserva = FatoReserva::create([
                'sala_id' => $request->input('sala_id'),
                'data_reserva' => $request->input('data_reserva'),
                'hora_inicio' => $request->input('hora_inicio'),
                'hora_fim' => $request->input('hora_fim'),
                'user_id' => auth()->user()->id,
            ]);
    
            DB::commit();
    
            return redirect()->route('reservas.index')->with('success', 'Reserva Realizada!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao criar reserva. Por favor, tente novamente.');
        }
    }
    


    public function edit(FatoReserva $reserva)
    {
        // Use o método all() para carregar todas as salas
        $salas = DSala::all();

        // Passe a reserva e as salas para a view 'reservas.edit'
        return view('reservas.edit', compact('reserva', 'salas'));
    }

    public function update(Request $request, FatoReserva $reserva)
    {
        // Valide os dados da requisição
        $data = $request->validate([
            'sala_id' => 'required|integer',
            'user_id' => 'required|integer',
            'data_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i',
        ]);

        // Atualize a reserva com os dados validados
        $reserva->update($data);

        // Redirecione o usuário para a rota 'reservas.index' com uma mensagem de sucesso
        return redirect()->route('reservas.index')->with('success', 'Reserva atualizada com sucesso.');
    }

    public function getReservedDatesAndTimes()
    {
        // Obtenha todas as reservas existentes
        $reservas = FatoReserva::all();

        $reservedDatesAndTimes = [];

        foreach ($reservas as $reserva) {
            // Crie uma matriz de datas e horas já reservadas
            $reservedDatesAndTimes[] = [
                'sala_id' => $reserva->sala_id,
                'data_reserva' => $reserva->data_reserva,
                'hora_inicio' => $reserva->hora_inicio,
                'hora_fim' => $reserva->hora_fim,
            ];
        }

        return $reservedDatesAndTimes;
    }


    public function destroy(FatoReserva $reserva)
    {
        // Exclua a reserva
        $reserva->delete();

        // Redirecione o usuário para a rota 'reservas.index' com uma mensagem de sucesso
        return redirect()->route('reservas.index')->with('success', 'Reserva excluída com sucesso.');
    }
}