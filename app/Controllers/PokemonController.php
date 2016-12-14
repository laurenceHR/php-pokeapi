<?php

use Illuminate\Database\Capsule\Manager as DB;
use App\Controllers\BaseController;

class PokemonController extends BaseController{
	
	public function index($id = 0){		
		if($id!=0){			
			$Pokemon = DB::table('pokemon')->where('id',$id)->first();
			if($Pokemon){
				$Pokemon->name = $Pokemon->identifier;
				$Abilities = DB::table('pokemon_abilities as pa')
							   ->leftJoin('abilities as a','pa.ability_id','=','a.id')
							   ->select('a.id','pa.slot','a.identifier as name')
							   ->where('pa.pokemon_id',$id)
							   ->get();
				$Pokemon->abilities = $Abilities;

				$Types = DB::table('pokemon_types as pt')
						   ->leftJoin('types as t','pt.type_id','=','t.id')
						   ->select('t.id','pt.slot','t.identifier as name')
						   ->where('pt.pokemon_id',$id)
						   ->get();
				$Pokemon->types = $Types;
			}
			$this->toJson($Pokemon);
		}
	}
	public function types($id){
		$Pokemon = DB::table('pokemon')->where('id',$id)->first();
		if($Pokemon){
			$Types = DB::table('pokemon_types as pt')
					   ->leftJoin('types as t','pt.type_id','=','t.id')
					   ->select('t.id','pt.slot','t.identifier as name')
					   ->where('pt.pokemon_id',$id)
					   ->get();
			$Pokemon->types = $Types;
		}
		$this->toJson($Pokemon);
	}
}