<?php
function f($n){

		if($n==1)
			return 0;
		
		else if ($n%2==0) {
				return	1+f($n/2);
		}
		else{
			return 1+f(3*$n+1);
		}
}
echo f(1);





