<?php 
/**
 * Class Paging.
 *
 * @link	http://hardyantz.com/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @author	Buyung Hardiansyah <hardyantz@yahoo.com>
 * @since	Version 0.3
*/

Class Paging
{	
	private 
		$limit 			= 10,
		$first 			= 'First',
		$last 			= 'Last',
		$show_results 	= '';
	
	public function set_option($option = array())
	{
		if(isset($option['list_style'])){
			$style = explode("#",$option['list_style']);
			list($this->before, $this->after) = $style;
		}
		
		if(isset($option['current_style'])){
			$current_style = explode("#",$option['current_style']);
			list($this->before_current, $this->after_current) = $current_style;
		}
		
		$this->total_page = ceil($option['total']/10);
		
		unset(
				$option['list_style'],
				$option['current_style'],
				$option['total']
			);
		
		foreach($option as $key => $value) {
			$this->$key = $value;
		}
	}
	
	public function show()
	{
		
		$results = array();
		
		if($this->total_page > 1) {
			
			$results[$i++] = $this->before.'<a href='.str_replace('#','1',$this->uri).'>'.$this->first.'</a>'.$this->after;
				
			if($this->current >2 && $this->total_page >5 )$results[$i++] = "&nbsp;..&nbsp;";
				
			if($this->total_page > 5) {
				$start_p = (($this->current-2)>0) ? ($this->current-2) : 1;
				$last_p = (($this->current+2)>$this->total_page) ? $this->total_page : ($this->current+2);
					
				for($p=$start_p;$p<=$last_p;$p++){
					if($p==$this->current){
						$results[$i++] = $this->before_current.$p.$this->after_current;
					} else {
						$results[$i++] = $this->before.'<a href='.str_replace('#',$p,$this->uri).'>'.$p.'</a>'.$this->after;
					}
				}
					
			} else {
				for($p=1;$p<=$this->total_page;$p++) {
					$results[$i++] = $this->before.'<a href='.str_replace("#",$p,$this->uri).'>'.$p.'</a>'.$this->after;
				}
			}
				
			if($this->current < ($this->total_page-2) && $this->total_page >5 )$results[$i++] = "&nbsp;..&nbsp;";
				
			$results[$i++] = $this->before.'<a href='.str_replace('#',$this->total_page,$this->uri).'>'.$this->last.'</a>'.$this->after;
		}
	
		return ($this->show_results == 'array') ? $results : implode('',$results);
	}
}