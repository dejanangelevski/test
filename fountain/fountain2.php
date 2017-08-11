<?php
class Cup
{
	private $capacity=0.0;
	
	function _construct()
	{
		$this->capacity=0;
	}
	public function getCapacity()
	{
		return $this->capacity;
	}
	public function setCapacity($capacity)
	{
		$this->capacity=$capacity;
	}
	
}

class Fountain
{
private $glasses=array();

//fill all filds with 0
public function Matrix($wine)
{
	for($i=0; $i<=$wine; $i++)
	for($j=0; $j<=$wine; $j++)  
	
	$this->glasses[$i][$j]=0;
}

public function findWineAmount($c,$wine)
{
	$this->Matrix($wine);
	$cup=new Cup();
	$cup->setCapacity($wine);
    $this->glasses[0][0]=$cup->getCapacity();
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

public function getGlasses()
{	
return $this->glasses;
}

public function IndexNumber($column,$row)
{
	$k=0;
	
	for($i=0; $i<=$column; $i++)
	for($j=0; $j<=$column; $j++)
{
	//count values deferent from 0
	if($this->glasses[$i][$j]!=0)
	$k++;
	if($k==$row )
		return $this->glasses[$i][$j];
}		
}

}

$gl=new Fountain();

$level =$gl-> findWineAmount(2, 8);
$wineAmount=$gl->IndexNumber($level,6);
echo "The amount on given cup is ",$wineAmount;
$glasses=$gl->getGlasses();
for($i=0; $i<=$level; $i++)
    {
		echo "<br>";
for($j=0; $j<=$level; $j++)  
	 echo $glasses[$i][$j],"   ";
    }
?>
