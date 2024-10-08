<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    protected $reglasValidacion = [
        'rifa_id' => 'required|numeric|exists:rifas,id',
        'usuario_id' => 'required|numeric|exists:usuarios,id',
        'numero' => 'required|numeric',
        'fecha_venta' => 'required|date',
        'fecha_juego' => 'required|date'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Ticket::get();
            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => "No hay registros", 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), $this->reglasValidacion);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }
            $milisegundos = strtotime(now()) * 1000;
            $invertido = str_pad(strrev((string) $milisegundos), 13, '0', STR_PAD_LEFT);

            $data = new Ticket();
            $data->fill($request->all());
            $data->codigo = $invertido;
            $data->save();

            $rifa = Rifa::find($request->rifa_id);

            $ticket['fecha'] = $request->fecha_venta;
            $ticket['vendedor'] = $request->nombre_vendedor;
            $ticket['numero'] = $request->numero;
            $ticket['valor'] = $rifa->valor;
            $ticket['premio1'] = $rifa->primera_suerte;
            $ticket['premio2'] = $rifa->segunda_suerte;
            $ticket['premio3'] = $rifa->tercera_suerte;
            $ticket['premio4'] = $rifa->cuarta_suerte;
            $ticket['premio5'] = $rifa->quinta_suerte;
            $ticket['premio6'] = $rifa->sexta_suerte;
            $ticket['premio7'] = $rifa->septima_suerte;
            $ticket['codigo'] = $invertido;

            $pdfController = new PDFController();
            return $pdfController->generarTicket($ticket);
            
            // return response()->json(['result' => "Dato Registrado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:tickets,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $data = Ticket::find($request->id);
            $data->fill($request->all());
            $data->update();
            return response()->json(['result' => "Dato Actualizado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        try {
            $response = Ticket::find($ticket->id);
            if ($response) {
                $response->delete();
                return response()->json(['result' => "Dato Eliminado", 'code' => '200']);
            }
            return response()->json(['result' => "Registro no encontrado", 'code' => '404']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function conteoVendidos($fecha, $numero, $rifa_id) {
        try {
            $response = Ticket::where('rifa_id', $rifa_id)
            ->where('numero', $numero)
            ->whereDate('fecha_venta', $fecha)->count();

            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => 0, 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    public function ticketVendidos($fechaVenta) {
        try {
            $response = Ticket::with(['usuario:id,usuario', 'rifa'])->whereDate('fecha_venta', $fechaVenta)->get();

            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => 0, 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }
}
