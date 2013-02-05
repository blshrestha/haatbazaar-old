<?
##############################################
class paging
{
    var $koneksi;
    var $p;
    var $page;
    var $q;
    var $query;
    var $next;
    var $prev;
    var $number;
	
    function paging($baris=9, $langkah=9, $prev="[prev]", $next="[next]", $number="[%%number%%]")
    {
        $this->next=$next;
        $this->prev=$prev;
        $this->number=$number;
        $this->p["baris"]=$baris;
        $this->p["langkah"]=$langkah;
        $_SERVER["QUERY_STRING"]=preg_replace("/&page=[0-9]*/","",$_SERVER["QUERY_STRING"]);
        if (empty($_GET["page"])) {
            $this->page=1;
        } else {
            $this->page=$_GET["page"];
        }
    }

    function db($host,$username,$password,$dbname)
    {
        
        $this->koneksi=mysql_connect("localhost", "root","") or die("Connection Error");
        mysql_select_db("haatbazar");
        return $this->koneksi;
    }

    function query($query)
    {
        $kondisi=false;
            
			$value=@$_POST["value"];
			if($value=='') $value=@$_GET["value"];
	
			$categoryid=@$_POST["categoryid"];
			if($categoryid=='') $categoryid=@$_GET["categoryid"];
			if($categoryid=='') $categoryid='ALL';
		
 		$place=@$_POST["place"];
		if($place=='') $place=@$_GET["place"];
			if($place=='') $place='ALL';
		
 		/*if($value=='')
 		{
 		die('<div class="warning">Provide String to search. ');
 		}*/
			/*$query="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description 						LIKE '%".$value."%' ))
					  AND ( ccinfo.address LIKE '%".$place."%' )
					  AND ( item.status != 'Sold' )
					 )";*/
					 //$query="select *from item where name='Bhaisi'";
         
        // this->query=$query;
         
         
         //echo"the passed query is:$query";
	$query1="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description 					LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$place."%' )
					  AND ( item.status != 'Sold' )
					 )";
	$querytemp = mysql_query($query);
        $this->p["count"]= mysql_num_rows($querytemp);
  	$this->p["total_page"]=ceil($this->p["count"]/$this->p["baris"]);
	  if  ($this->page<=1)
            $this->page=1;
        elseif ($this->page>$this->p["total_page"])
            $this->page=$this->p["total_page"];
	  $this->p["mulai"]=$this->page*$this->p["baris"]-$this->p["baris"];
        if($categoryid=="ALL")
	{
	$query=$query." limit ".$this->p["mulai"].",".$this->p["baris"];
        $query=mysql_query($query) or die("Query Error");
        $this->query=$query;
	//echo"inside query";
	}
	else
	{
	$query=$query1." limit ".$this->p["mulai"].",".$this->p["baris"];
        $query=mysql_query($query1) or die("Query Error");
        $this->query=$query;
	echo"inside query1";
	}
    
/*{    
echo "<br>function>>database.php>>search";
	$con=connectdb();

	if($place=='ALL') {
		$ccinfo_address='%';
		echo 'place = all';
	}
	else{ 
		$ccinfo_address=$place;
		echo 'place != all';
	}
	
	if($categoryid=='ALL') 
	{
		$sql="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )";
			echo 'category = all';
	}
	else
	{
	echo "<br>jasdfksfhasdkfjkasd category != all";
		$sql="SELECT item.id
			  FROM `item` INNER JOIN `ccinfo`
			  ON item.ccid=ccinfo.ccid
			  WHERE (
			  		  ((item.name LIKE '%".$value."%' ) OR (item.description LIKE '%".$value."%' ))
					  AND ( item.categoryid='".$categoryid."' )
					  AND ( ccinfo.address LIKE '%".$ccinfo_address."%' )
					  AND ( item.status != 'Sold' )
					 )";
	}

	$result=mysql_query($sql,$con)
		or //die($sql.' <div class="error"> ERROR gsdfgsdgwhile searching in database<br>'.mysql_error().'</div>');
	die($sql." cannot be executed");
	
	echo 'result = '.$result;
	return $result;
}*/







}
    
    function result()
    {
        echo"inside result function";
	return $result=mysql_fetch_object($this->query);
    }

    function result_assoc()
    {
        return mysql_fetch_assoc($this->query);
    }

    function print_no()
    {
        $number=$this->p["mulai"]+=1;
        return $number;
    }
    
    function print_color($color1,$color2)
    {
        if (empty($this->p["count_color"]))
            $this->p["count_color"] = 0;
        if ( $this->p["count_color"]++ % 2 == 0 ) {
            return $color=$color1;
        } else {
            return $color=$color2;
        }
    }

    function print_info()
    {
        $page=array();
        $page["start"]=$this->p["mulai"]+1;
        $page["end"]=$this->p["mulai"]+$this->p["baris"];
        $page["total"]=$this->p["count"];
        $page["total_pages"]=$this->p["total_page"];
            if ($page["end"] > $page["total"]) {
                $page["end"]=$page["total"];
            }
            if (empty($this->p["count"])) {
                $page["start"]=0;
            }

        return $page;
    }

    function print_link()
    {
        //generate template
        function number($i,$number)
        {
            return ereg_replace("^(.*)%%number%%(.*)$","\\1$i\\2",$number);
        }
        $print_link = false;

        if ($this->p["count"]>$this->p["baris"]) {

            // print prev
            if ($this->page>1)
            $print_link .= "<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=".($this->page-1)."\">".$this->prev."</a>\n";

            // set number
            $this->p["bawah"]=$this->page-$this->p["langkah"];
                if ($this->p["bawah"]<1) $this->p["bawah"]=1;

            $this->p["atas"]=$this->page+$this->p["langkah"];
                if ($this->p["atas"]>$this->p["total_page"]) $this->p["atas"]=$this->p["total_page"];

            // print start
            if ($this->page<>1)
            {
                for ($i=$this->p["bawah"];$i<=$this->page-1;$i++)
                    $print_link .="<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=$i\">".number($i,$this->number)."</a>\n";
            }
            // print active
            if ($this->p["total_page"]>1)
                $print_link .= "<b>".number($this->page,$this->number)."</b>\n";

            // print end
            for ($i=$this->page+1;$i<=$this->p["atas"];$i++)
            $print_link .= "<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=$i\">".number($i,$this->number)."</a>\n";

            // print next
            if ($this->page<$this->p["total_page"])
            $print_link .= "<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=".($this->page+1)."\">".$this->next."</a>\n";

            return $print_link;
        }
    }
}
?> 