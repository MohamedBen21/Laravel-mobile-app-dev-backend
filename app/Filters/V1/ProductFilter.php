<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class ProductFilter extends ApiFilter{


        protected $safeParms = [

            'idMagasin'=>['eq','gt','lt','gte','lte','neq'],
            'Name'=>['eq'],
            'Description'=>['eq'],
            'productImage'=>['eq'],
            


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