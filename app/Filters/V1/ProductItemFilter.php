<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class ProductItemFilter extends ApiFilter{


        protected $safeParms = [
            
            'idProduct'=>['eq','neq','gt','lt','lte','gte'],
            'qteStock'=>['eq','neq','gt','lt','lte','gte'],
            'Price'=>['eq','neq','gt','lt','lte','gte'],
            'productItemImage'=>['eq'],

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