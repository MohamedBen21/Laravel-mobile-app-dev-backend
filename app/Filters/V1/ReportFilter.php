<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class ReportFilter extends ApiFilter{
        protected $safeParms =[
            'reporterType'=>['eq'],
            'idReporter'=>['eq','lt','gt','lte','gte','neq'],
            'reportedType'=>['eq'],
            'idReported'=>['eq','lt','gt','lte','gte','neq'],
            'reportDate'=>['eq'],
            'reason'=>['eq'],
            'status'=>['eq'],
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