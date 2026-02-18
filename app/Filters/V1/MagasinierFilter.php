<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class MagasinierFilter extends ApiFilter{


        protected $safeParms = [

            'idUtilisateur'=>['eq','gt','lt','gte','lte','neq'],
            'idAdress'=>['eq','gt','lt','gte','lte','neq'],
            'Username'=>['eq'],
            'salesCount'=>['eq','gt','lt','gte','lte','neq']


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