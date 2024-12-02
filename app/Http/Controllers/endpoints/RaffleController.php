<?php

namespace App\Http\Controllers\Raffles;

use App\Http\Controllers\Controller;
use App\Models\Raffle;
use DateTime;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            //Este, que muestre todas, pero todas las rifas
        $raffles = Raffle::all()->sortByDesc('created_at'); //Así, me las muestra de la más reciente, a la más antigua
        return view('raffles.index', compact('raffles'));   //Esa vista OBVIAMENTE debe cambiar por el nombre que debe ser
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            //Para crear una nueva rifa (que me imagino que viene de un formulario)
        $raffle = new Raffle();
            $raffle->name = $request->input('name');
            $raffle->description = $request->input('description');
            $raffle->draw_date = $request->input('drawDate');
            $raffle->total_tickets = $request->input('totalTickets');

        $raffle->save();
        return redirect('raffles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($userID)
    {
            //Este método me va a mostrar todas las rifas en las que está participando el usuario
        $tickets = Ticket::where('user_id', $userID)->get();
            //Iterar con cada ticket, y obtener las rifas diferentes
        $raffles = [];
        foreach ($tickets as $ticket) {
            $raffles->push(Raffles::find($ticket->raffleID));
        }
        $raffles = array_unique($raffles);
            // Obtener la fecha actual
        $currentDate = new DateTime();
        $raffles = array_filter($raffles, function($raffle) use ($currentDate) {
            return $raffle->draw_date > $currentDate;  // Compara la fecha de juego con la fecha actual
        });
            //Ya, con cada ticket, busco su rifa, que sea diferente, y se la mando a la vista
        return view('myRaffles.show', compact($raffles));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            //Sólo se puede modificar la fecha de juego
        if ($request->input('drawDate') > new DateTime()) {
            Raffle::find($id)->update([
                'draw_date' => $request->input('drawDate')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            //Buscar esta rifa
        Raffle::find($id)->delete();
            //Redirigir al panel de las rifas, actualizando
        return redirect('raffles.index');
    }
}
