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
        $data['records'] = Sale::orderBy('id', 'ASC')->paginate(4);
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

        $request->validated([
            'csv' => 'required|file',
        ]);

        if ($csv = $request->file('csv')) {
            $fileDestionationPath = 'uploads/';
            $filecsv  = date('YmdHis') . "." . $csv->getClientOriginalExtension();
            $csv->move($fileDestionationPath, $filecsv );
            $filePath = $fileDestionationPath . $filecsv ;

            $sales = $this->validateToArrayFile($filePath);

            foreach ($sales as $sale) {

                $sale = [
                    'buyer' => $sale['Comprador'],
                    'description' => $sale['Descrição'],
                    'unit_price' => $sale['Preço Unitário'],
                    'quantity' => $sale['Quantidade'],
                    'address' => $sale['Endereco'],
                    'supplier' => $sale['Fornecedor']
                ];
                Sale::create($sale);
            }
            return redirect()->back()->with('message', 'Arquivo de venda cadastrado com sucesso');
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
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('dashboard')->with('message', "Registro de venda excluído com sucesso!");
    }
}
