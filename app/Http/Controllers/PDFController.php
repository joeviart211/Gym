<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use PDF;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $a=$request->id;
        $members=DB::table('mst_members')->where('id',$a)->first();
        $IMC=$members->imc;

        
        

        
          
                    

        //  dd($IMC);
        if($IMC<18.5){
            $data = [
                'title' => 'Plan para  aumento de peso',
                'date' => date('d/m/Y'),
                'alimentacion'=> 'mayor consumo de carnes magras, consumo de pollo hervido(de preferencia pechuga), consumo de huevo hervido, consumo de atun
                frufas y verduras por la noche, cocinar con poco aceite de olivo o asando la carne en su propio jugo, didvir las comidas del dia
                en 5, consumo moderado de azucar y grasas chatarra.',
                'ejercicio'=>'Estiramiento antes y despues de la rutina, cambiar cardio por abdominales, realizar 4 series de 12 repeticiones,
                uso de peso progresivo entre cada serie.',
                'name'=>$members->name
                
            ];
            // echo"bajo IMC";
        }else{
            if($IMC>=18.5 && $IMC<25){
                $data = [
                    'title' => 'Plan para definición muscular',
                    'date' => date('d/m/Y'),
                    'alimentacion'=> 'Menor consumo de carnes magras, consumo moderado de pollo y pescado, mayor consumo de frutas y verduras de preferencia en la noche,
                    consumo de legumbre, hidratos, proteinas, evitar el consumo de sal y alimentos procesados, evitar consumo de cualqueir tipo de alimento o
                    bebidas con azucar.',
                    'ejercicio'=>'Peso moderado, mantener 4 series con un aumento de repeticiones de 12-15 por serie, cardio de 30-45 minutos despues de la rutina
                    realizar biseries o triseries en los ejercicios realizados.',
                    'name'=>$members->name
                    
                ];
               
                // echo "Saludable";
            }else{
                if($IMC>=25 && $IMC<30){
                    $data = [
                        'title' => 'Plan para control de peso',
                        'date' => date('d/m/Y'),
                        'alimentacion'=> 'Menor consumo de azucar y bebidas endulzantes, evitar el consumo de galletas o pan de dulce, reducir consumo de sal,
                        cocinar los alimentos con aceite de olivo, consumo de avena por las mañanas, divir las comidas en 4-5 veces por dia
                        teniendo pequeñas porciones. ',
                        'ejercicio'=>'ejercicios de manera ascendente con el peso utilizado, realizando 4 series de 10-12 repeticiones, 45 minutos de cardio
                        despues de la rutina de ejercicios.',
                        'name'=>$members->name
                        
                    ];
                    // echo"Sobrepeso";
                }else{
                    if($IMC>=30){
                        $data = [
                            'title' => 'Plan para bajar de peso',
                            'date' => date('d/m/Y'),
                            'alimentacion'=> ' Menor consumo de grasas chatarra (grasas saturadas) y carbohidratos, menos consumo de azucar y bebidas endulzantes, 
                            consumo moderado de agua (2 litros diarios), reduccion del consumo de sal.',
                            'ejercicio'=>'ejercicios moderados de todas las areas del cuerpo, con 4 series de 8 repeticiones por ejercicio, 45 minutos de cardio
                            despues de la rutina de ejercicio, preferentemente realizar ejercicio antes de las 12 del dia.',
                            'name'=>$members->name
                            
                        ];
                        // echo"Obesidad";
                    }
                } 
            }
        }

        $pdf = PDF::loadView('download',$data);
        $nombreD=$members->name.".pdf";
        
          return $pdf->download($nombreD);
    

        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
