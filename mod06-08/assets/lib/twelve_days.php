<?php

	function getTitle() {
		return '12 Days of Christmas';
	}

	function getLyrics($day) {
		$days = array('first',
		 				'second',
		 				'third',
		 				'forth', 
		 				'fifth', 
		 				'sixth', 
		 				'seventh', 
		 				'eight', 
		 				'ninth', 
		 				'tenth', 
		 				'eleventh', 
		 				'twelfth');

		$gifts = array('A partridge in a pear tree', 
						'Two turtle dove', 
						'Three french hens',
						'Four calling birds',
						'Five golden rings',
						'Sixth geese a-laying',
						'Seven swans are swimming',
						'Eight maids a-milking',
						'Nine ladies dancing',
						'Ten lords a-leaping',
						'Eleven pipers piping',
						'Twelve drummers drumming');

		return array($days[$day], $gifts[$day]);

	}

?>