<?php

class Atom{
	
}


class Hucre extends Atom{
	
	public function yapi($yapi){
		return $yapi;
	}
}


class Organ extends Hucre{
	
	public function ozellik($ozellik){
		return $ozellik;
	}
}

class Uzuv extends Organ{
	public function kol($parmak_sayisi){
		$kol['el']=	$this->el($parmak_sayisi);
		$kol['dirsek']=	$this->dirsek();
		$kol['bilek']=	$this->bilek();
		return $kol;
	}
	
	private function el($parmak_sayisi){
		for($i=1;$i<=$parmak_sayisi;$i++){
			$organ=new Organ();
			$el['parmaklar'][]=['yapi'=>'et ve kemik','ozellik'=>$organ->ozellik('dokunmak')];
		}
		return $el;
	}
	
	public function kafa($ten_rengi,$sac_rengi){
		$sac=new Hucre();
		$kornea1=new Hucre();
		$kornea2=new Hucre();
		$agiz=new Organ();
		$kafa['ten_rengi']=$ten_rengi;
		$kafa['sac']['yapi']=$sac->yapi('kil');
		$kafa['sac']['renk']=$sac_rengi;
		$kafa['goz1']=$kornea1->yapi('kornea');
		$kafa['goz2']=$kornea2->yapi('kornea');
		$kafa['agiz']=$agiz->ozellik('konusmak');
		return $kafa;
	}
	
	public function dirsek(){
		$organ=new Organ();
		return $organ->ozellik('hareket');
	}
	
	public function bilek(){
		$organ=new Organ();
		return $organ->ozellik('hareket');
		 
	}
	
	public function bacak($parmak_sayisi){
		$bacak['dirsek']=$this->dirsek();
		
		for($i=1;$i<=$parmak_sayisi;$i++){
			$organ=new Organ();
			$el['parmaklar'][]=['yapi'=>'et ve kemik','ozellik'=>$organ->ozellik('dokunmak')];
		}
		
		return $bacak;
		
	}
}


class Insan extends Uzuv{	

private $insan;

	public function olustur($isim,$yas,$kol_sayisi,$bacak_sayisi,$el_parmak_sayisi,$ayak_parmak_sayisi){
		$insan['isim']=$isim;
		$insan['yas']=$yas;
		
		for($i=1;$i<=$kol_sayisi;$i++){
		$insan['kollar'][]=$this->kol($el_parmak_sayisi);
		}
		
		for($i=1;$i<=$bacak_sayisi;$i++){
		$insan['bacaklar'][]=$this->bacak($ayak_parmak_sayisi);
		}
		$insan['kafa']=$this->kafa('esmer','#ffFF00');
		$this->insan=$insan;
		return $this;
	}
	
	
public function goruntule(){
	$insan=$this->insan;
	echo '<div style="width:25%;float:left;margin:10px;" onclick="alert(\'Merhaba benim adım '.$insan['isim'].'! '.$insan['yas']. 'yaşındayım \')">';
		echo '<div  style="margin:auto;width:100px;height:100px;border-radius:100%;background:'.$insan['kafa']['sac']['renk'].'"></div>';
		echo '<div style="display:flex;flex-direction: row;">';
		foreach($insan['kollar'] as $index=>$kol){
			if(count($insan['kollar'])/2<=$index){
				$genislik=50/count($insan['kollar']);
				echo '<div style="width:'.$genislik.'%;margin:1px;height:100px;background:#aaa"></div>';
			}
		}
		echo '<div style="width:50%;margin:1px;height:200px;background:#f00"></div>';
		foreach($insan['kollar'] as $index=>$kol){
			if(count($insan['kollar'])/2>$index){
				$genislik=50/count($insan['kollar']);
				echo '<div style="right;width:'.$genislik.'%;margin:1px;height:100px;background:#aaa"></div>';
			}
		}
		echo '</div>';
		echo '<div style="display:flex;flex-direction: row;">';
			foreach($insan['bacaklar'] as $bacak){
				$genislik=100/count($insan['bacaklar']);
				echo '<div style="width:'.$genislik.'%;margin:1px;height:100px;background:#777"></div>';
			}
		echo '</div>';
		echo '</div>';
}
	
}


$insan1=new Insan();
$insan1->olustur('leyla',24,6,8,5,5)->goruntule();
$insan2=new Insan();
$insan2->olustur('mecnun',26,4,4,4,4)->goruntule();
$insan3=new Insan();
$insan3->olustur('erdal',43,4,2,5,5)->goruntule();
$insan4=new Insan();
$insan4->olustur('ismail abi',32,2,2,5,5)->goruntule();