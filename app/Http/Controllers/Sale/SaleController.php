<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['records'] = Sale::latest()->paginate(20);
        return view('dashboard')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $request->validate([
            'csv' => 'required',
        ]);

        $input = $request->all();

        if ($csv = $request->file('csv')) {
            $csvDestinationPath = 'uploads/';
            $postCsv = date('YmdHis') . "." . $csv->getClientOriginalExtension();
            $csv->move($csvDestinationPath, $postCsv);
            $csvPath = $csvDestinationPath . $postCsv;

            $users = $this->validateToArrayFile($csvPath);

            foreach ($users as $user) {

                $user = [
                    'buyer' => $user['Comprador'],
                    'description' => $user['Descrição'],
                    'unit_price' => $user['Preço Unitário'],
                    'quantity' => $user['Quantidade'],
                    'address' => $user['Endereco'],
                    'supplier' => $user['Fornecedor']
                ];
                Sale::create($user);
            }

            return redirect()->route('dashboard')->with('message', 'Arquivo de venda cadastrado com sucesso');

        }
    }

    public function validateToArrayFile($filename = '', $delimiter = ',', $escape = '\\')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, "\t", $delimiter, $escape)) !== false) {

                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleRequest $request)
    {
        $request->delete();

        return redirect()->route('dashboard')->with('message', "Registro de venda excluído com sucesso!");
    }
}
