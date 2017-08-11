<?php
class Fountain
{	
private $glasses=array();

//fill all filds with 0 value
public function Matrix()
{
for($i=0; $i<=15; $i++)
for($j=0; $j<=15; $j++)  
	 $this->glasses[$i][$j]=0;
}

public function findWineAmount($c,$n)
{
	$this->Matrix();
    $this->glasses[0][0]=$n;
    $height=0;
    $wineOnLevel = true;
	    while($wineOnLevel)
    {
        $wineOnLevel = false;

		for($j=0; $j<=$height; $j++){
				if($this->glasses[$height][$j] > $c)
            {	
				//subtract capacity from one glass
                $extraWine = $this->glasses[$height][$j] - $c;
				//assign the capacity to the glass
                $this->glasses[$height][$j] = $c;
				//Overflow on both glasses
                (double)$this->glasses[$height+1][$j] =(double)($this->glasses[$height+1][$j])+(double)($extraWine/2);
				(double)$this->glasses[$height+1][$j+1] =(double)($this->glasses[$height+1][$j+1])+(double)($extraWine/2);
                $wineOnLevel = true;
            }
        }
        $height++;
    }

    return $height-1;

}
public function getGlasses(){
	return $this->glasses;
}
};
//create new object
$gl=new Fountain();

$amount =$gl-> findWineAmount(2, 8);

$glasses=$gl->getGlasses();
for($i=0; $i<=$amount; $i++)
    {
		echo "<br>";
for($j=0; $j<=$amount; $j++)  
	 echo $glasses[$i][$j],"   ";
    }
?>
