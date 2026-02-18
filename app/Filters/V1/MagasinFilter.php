<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class MagasinFilter extends ApiFilter{


        protected $safeParms = [

            'idMagasinier'=>['eq','gt','lt','gte','lte','neq'],
            'Category'=>['eq'],
            'name'=>['eq'],
            'magasinImage'=>['eq'],


        ];

        protected $columnMap = [];

        protected $operatorMap = [

            'eq'=>'=',
            'neq'=>'!=',
            'gt'=>'>',
            'lt'=>'<',
            'gte'=>'>=',
            'lte'=>'<='


        ];



        
    }




?>