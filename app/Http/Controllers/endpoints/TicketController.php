<?php

namespace App\Http\Controllers\Raffles;

use App\Http\Controllers\Controller;
use App\Models\Raffle;
use App\Models\Ticket;
use Faker\Core\Number;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            //Ilustra la compra de un boleto    (se va rellenando de acuerdo con los atributos fillable del modelo)
        Ticket::create([
            'raffles_id' => $request->get('raffle_id'),
            'user_id' => $request->get('user_id'),
            'ticket_number' => $request->get('ticket_number'),
            'price' => $request->get('price')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $ticketID, string $ticketNumber, string $raffleID)
    {
            //Este método me va a permitir comprar un boleto en esta rifa
                //Verificar que este número no esté ya comprado
        $raffle = Raffle::find($raffleID);
        $ticket = Ticket::find($ticketID);
            //Si no está nulo, ni vacío, se lo asignamos a dicha rifa, y al usuario
        if (!(is_null($ticket) || empty($ticket))) {
            $user = User::find($request->input('user_id')); //Este atributo debe tener la etiqueta hidden en la vista
                //Poblar los atributos del ticket
            $ticket->ticket_number($ticketNumber);
            $ticket->raffles_id($raffle->id);
            $ticket->user_id($user->id);
                //Guardar dicho ticket en base de datos
            $ticket->save();
        }
        return redirect('myRaffles.show', compact('ticket', 'raffle'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $raffleID)
    {
            //Para mostrar todos los boletos comprados por rifa hasta el momento
        $tickets = Ticket::where('raffles_id', $raffleID)->get();
        return view('ticketsPurchased.show', compact('tickets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            //Sólo se le puede modificar el precio
        Ticket::find($id)->update([
            'price' => $request->input('price')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
