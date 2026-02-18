<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class PromoCodeFilter extends ApiFilter{
        protected $safeParms =[
            
            'idAdmin'=>['eq','lt','gt','lte','gte','neq'],
            'Name'=>['eq'],
            'Description'=>['eq'],
            'discountRate'=>['eq','lt','gt','lte','gte','neq'],
            'startDate'=>['eq'],
            'endDate'=>['eq'],
        ];

        protected $columnMap = [];

        protected $operatorMap =[

            'eq'=>'=',
            'neq'=>'!=',
            'gt'=>'>',
            'lt'=>'<',
            'gte'=>'>=',
            'lte'=>'<='
        ];


    }


?>