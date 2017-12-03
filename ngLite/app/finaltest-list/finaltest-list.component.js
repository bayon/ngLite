'use strict';
angular.
	 module('finaltestList').
		 component('finaltestList',{
			 templateUrl: 'finaltest-list/finaltest-list.template.html',
			 controller: ['Finaltest',
				 function FinaltestListController(Finaltest) {
					 this.objects = Finaltest.query();
					 this.orderProp = 'ordering';
				 }
			 ]
		 });
