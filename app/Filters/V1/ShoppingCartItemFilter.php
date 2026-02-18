<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class ShoppingCartItemFilter extends ApiFilter{


        protected $safeParms = [

            'idCart'=>['eq','gt','lt','gte','lte','neq'],
            'idProductItem'=>['eq','gt','lt','gte','lte','neq'],
            'qteProd'=>['eq','gt','lt','gte','lte','neq'],

            


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