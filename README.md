paging
======

simple paging class

how to use :
============

1. inisiate class 
$paging = new Paging;

2. set option for paging, example :
$paging->set_option( array(
		'limit' => 10,
		'total' => 210,
		'current' => (isset($_GET['p'])) ? $_GET['p'] : 1,
		'uri'	=> $_SERVER['PHP_SELF'].'?p=#'
	)
);

3. show paging:
print_r($paging->show());


class paging option :
=====================
- limit         => per page limit
- total         => total row results
- current       => current page show
- uri           => uri paging. use # to replace number of paging
- first         => replace first text
- last          => replace last text
- show_results  => show results in 'array' or 'string' . (default is string), you can change results to array. 
- list_style    => html tu use in each list. example use : array ('list_style' => '<li>#</li>' . # is to replace page number and uri. results will be '<li><a href='uri?p='></li>
- current_style => html tu use in each current page. example use : array ('current_style' => '<li>#</li>' . # is to replace page number . results will be '<li>{page number}</li>
- 
)


