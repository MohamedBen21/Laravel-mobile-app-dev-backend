<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class ClientFilter extends ApiFilter{


        protected $safeParms = [

            'idUtilisateur'=>['eq','gt','lt','gte','lte','neq'],
            'idAdress'=>['eq','gt','lt','gte','lte','neq'],
            'ClientImage'=>['eq'],
            'Username'=>['eq'],
            'buysCount'=>['eq','gt','lt','gte','lte','neq'],


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