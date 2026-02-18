<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class AdminFilter extends ApiFilter{


        protected $safeParms = [

            'idUtilisateur'=>['eq','gt','lt','gte','lte','neq'],
            'Role'=>['eq'],
            'Username'=>['eq']


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