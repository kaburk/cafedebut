<?php
if ($this->viewPath == 'home'){
	echo '<strong>Home</strong>';
}else{
	$crumbs = $this->BcBaser->getCrumbs();
	if (!empty($crumbs)){
		foreach($crumbs as $key => $crumb){
			if($this->BcArray->last($crumbs, $key+1)) {
				if($crumbs[$key+1]['name'] == $crumb['name']) {
					continue;
				}
			}
			if($this->BcArray->last($crumbs, $key)) {
				if ($this->viewPath != 'home' && $crumb['name']){
					$this->BcBaser->addCrumb('<strong>'.$crumb['name'].'</strong>');
				}elseif($this->name == 'CakeError'){
					$this->BcBaser->addCrumb('<strong>404 NOT FOUND</strong>');
				}
			} else {
				$this->BcBaser->addCrumb($crumb['name'], $crumb['url']);
			}
		}
	}
	$this->BcBaser->crumbs(' &gt; ','Home');
}
?>