<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poligono;

class PoligonoController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poligonos = Poligono::all();

        if (!$poligonos->isEmpty()) {

            return response()->json([
                'message' => 'Lista dos polígonos! ',
                'info' => $poligonos,
                'status' => 200
            ], 200);

        } else {

            return response()->json([
                'message' => 'Nenhum polígono cadastrado!',
                'info' => $poligonos,
                'status' => 400
            ], 400);

        }
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRetangulo(Request $request)
    {
        try {

            $poligono = new Poligono();
            $poligono->tipo = 'retangulo';
            $poligono->fill($request->all());
            $poligono->area = $poligono->base * $poligono->altura;
            $poligono->save();
            
            return response()->json([
                'message' => 'Retângulo cadastrado com sucesso! ',
                'info' => $poligono,
                'status' => 200
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Não foi possível cadastrar o retângulo!',
                'error' => $e->getMessage(),
                'status' => 400
            ], 400);

        }
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTriangulo(Request $request)
    {
        try {

            $poligono = new Poligono();
            $poligono->tipo = 'triangulo';
            $poligono->fill($request->all());
            $poligono->area = $poligono->base * $poligono->altura / 2;
            $poligono->save();
            
            return response()->json([
                'message' => 'Triângulo cadastrado com sucesso!',
                'info' => $poligono,
                'status' => 200
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Não foi possível cadastrar o Triângulo!',
                'error' => $e->getMessage(),
                'status' => 400
            ], 400);
            
        }
    }

    /**
     * Retorna o valor da soma das áreas de todos os polígonos cadastrados.
     */
    public function totalAreaPoligonos()
    {
        try {

            $poligonos = Poligono::all();
            $total_areas = $poligonos->sum('area');
            
            return response()->json([
                'message' => 'Soma feita com sucesso!',
                'info' => 'O valor total da soma das áreas de todos os polígonos é de ' . $total_areas . ' centímetro quadrado.',
                'total' => $total_areas,
                'status' => 200
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Não foi possível fazer a soma!',
                'error' => $e->getMessage(),
                'status' => 400
            ], 400);
            
        }
    }

    /**
     * Exibir o recurso especificado.
     * Usando parametro -> Route Model Binding Implicito
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Poligono $poligono)
    {
        return response()->json([
            'message' => 'Elemento exibido com sucesso!',
            'info' => $poligono,
            'status' => 200
        ], 200);
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poligono $poligono)
    {
        if ($poligono->tipo == 'retangulo') {
            try {

                $poligono->fill($request->all());
                $poligono->area = $poligono->base * $poligono->altura;
                $poligono->save();
                
                return response()->json([
                    'message' => 'Retângulo atualizado com sucesso! ',
                    'info' => $poligono,
                    'status' => 200
                ], 200);
    
            } catch (\Exception $e) {
    
                return response()->json([
                    'message' => 'Não foi possível atualizar o retângulo!',
                    'error' => $e->getMessage(),
                    'status' => 400
                ], 400);
    
            }
        } else {
            try {

                $poligono->fill($request->all());
                $poligono->area = $poligono->base * $poligono->altura / 2;
                $poligono->save();
                
                return response()->json([
                    'message' => 'Triângulo atualizado com sucesso! ',
                    'info' => $poligono,
                    'status' => 200
                ], 200);
    
            } catch (\Exception $e) {
    
                return response()->json([
                    'message' => 'Não foi possível atualizar o triângulo!',
                    'error' => $e->getMessage(),
                    'status' => 400
                ], 400);
    
            }
        }
    }

    /**
     * Remove o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poligono $poligono)
    {
        $poligono->delete();

        return response()->json([
            'message' => 'Polígono deletado com sucesso! ',
            'info' => $poligono,
            'status' => 200
        ], 200);
    }
}
