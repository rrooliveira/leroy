<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
use App\Jobs\GravaProdutos;
use App\Product as Product;

class Produto extends Controller
{
	public function index()
	{		
		return view('produto');
	}
	
	public function importar(Request $request){
		//VALIDA O ARQUIVO XLS
		$this->validate($request, array(
			'file' => 'required'
		));
		
		if($request->hasFile('file')){
			//VERIFICA SE A EXTENSÃO DO ARQUIVO É VALIDA
			$extension = File::extension($request->file->getClientOriginalName());
			if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
				
				//PROCESSA O ARQUIVO
				$path = $request->file->getRealPath();
				$data = Excel::load($path, function($reader) {
				})->get();
				
				if(!empty($data) && $data->count()){
					//CONVERT PARA ARRAY
					foreach ($data->toArray() as $key => $value) {
						
						if(!empty($value)){
							
							foreach ($value as $v) {		
								if(!empty($v['lm'])){
									$insert[] = [
											'lm' => $v['lm'],
											'name' => $v['name'],
											'free_shipping' => $v['free_shipping'],
											'description' => $v['description'],
											'price' => $v['price'],
									];
								}
								
							}
						}
					}
					
					if(!empty($insert)){
						$insertData = DB::table('products')->insert($insert);
						if ($insertData) {
							//GERA O ARQUIVO DE LOG DO PROCESSAMENTO
							$this->dispatch(
								new GravaProdutos()
							);
							//MENSAGEM DE SUCESSO
							Session::flash('success', 'Os produtos foram importados corretamente!');
						}else {
							//MENSAGEM DE ERRO
							Session::flash('error', 'Erro ao processar a planilha');
							return back();
						}
					}else{
						//MENSAGEM DE ERRO
						Session::flash('error', 'Verifique a estrutura do arquivo');
						return back();
					}
				}
				
				return back();
				
			}else {
				//MENSAGEM DE ERRO
				Session::flash('error', 'O formato do arquivo atual: '.$extension.'. Utilize um dos seguintes formatos (xls, xlsx ou csv)');
				return back();
			}
		}
	}
	
	public function listar(){
		$produtos = Product::all();
		return view('produtos_listar',compact('produtos'));
	}
}
