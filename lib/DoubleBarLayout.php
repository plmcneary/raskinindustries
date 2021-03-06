<?php
class DoubleBarLayout implements PageLayout {

	public function fetchPagedLinks($parent, $queryVars) {
	
		$currentPage = $parent->getPageNumber();
		$str = "";

		if(!$parent->isFirstPage()) {
			if($currentPage != 1 && $currentPage != 2 && $currentPage != 3) {
					//$str .= "<a href='?page_id=45&page=1$queryVars' title='Start' class='more 457'>First</a> &lt; ";
			}
		}

		//write statement that handles the previous and next phases
	   	//if it is not the first page then write previous to the screen
		if(!$parent->isFirstPage()) {
			$previousPage = $currentPage - 1;
			$str .= "<a href=\"?page_id=45&page=$previousPage$queryVars\" class='more previous_agent'>Previous</a> ";
		}

		for($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
			//if i is less than one then continue to next iteration		
			if($i < 1) {
				continue;
			}
	
			if($i > $parent->fetchNumberPages()) {
				break;
			}
	
			if($i == $currentPage) {
				//$str .= "<span class='more' style='color:#CE1C00;font-size:19px;font-weight:bold;'>Page $i</span>";
			}
			else {
				//$str .= "<a class='more 444' href=\"?page_id=45&page=$i$queryVars\">$i</a>";
			}
			($i == $currentPage + 2 || $i == $parent->fetchNumberPages()) ? $str .= " " : $str .= "&nbsp;";              //determine if to print bars or not
		}//end for

		if (!$parent->isLastPage()) {
			if($currentPage != $parent->fetchNumberPages() && $currentPage != $parent->fetchNumberPages() -1 && $currentPage != $parent->fetchNumberPages() - 2)
			{
				//$str .= " &gt; <a class='more 123' href=\"?page_id=45&page=".$parent->fetchNumberPages()."$queryVars\" title=\"Last\">Last(".$parent->fetchNumberPages().") </a>";
			}
		}

		if(!$parent->isLastPage()) {
			$nextPage = $currentPage + 1;
			$str .= "<a class='more nextagent' href=\"?page_id=45&page=$nextPage$queryVars\">Next</a>";
		}
		return $str;
	}
}
?>