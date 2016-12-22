<?php
include_once'connection.php';
class clsreg
{
    public $regcod,$regname,$regeml,$regpwd,$regdat;
    function srcshrgrp($dcod,$rcod,$srcstr)
    {
        $con=new clscon();
        $qry="call srcshrgrp('$dcod','$rcod','$srcstr')";
        $res=  mysql_query($qry);
        $objarr=array();
        $i=0;
        while ($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
        mysql_close();
        return $objarr;
    }
    function srcshrusr($dcod,$rcod,$srcstr)
    {
        $con=new clscon();
        $qry="call srcshrusr('$dcod','$rcod','$srcstr')";
        $res=  mysql_query($qry);
        $objarr=array();
        $i=0;
        while ($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
        mysql_close();
        return $objarr;
    }
    function srcuser ($gcod,$str,$ownregcod)
    {
        $con=new clscon();
        $qry="call srcuser('$gcod','$str','$ownregcod')";
        $res=  mysql_query($qry)or die(mysql_error());
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
          $objarr[$i]=$r;
          $i++;
        }
        mysql_close();
        return $objarr;
     }
    function logincheck($eml,$pwd)
    {
        $con=new clscon(); 
        $qry="call logincheck('$eml','$pwd',@cod)";
        $res=  mysql_query($qry);
        $res1=  mysql_query("select @cod");
        $r=  mysql_fetch_row($res1);
        return $r[0];
    }
   public function save_rec()
    {
        $con=new clscon();
        $qry="call insreg('$this->regname','$this->regeml','$this->regpwd','$this->regdat')";
        $res=mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else
          {
              return false;
          }
    }
    public function update_rec()
    {
        $con=new clscon();
        $qry="call updreg('$this->regcod','$this->regname','$this->regeml','$this->regpwd','$this->regdat')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $qry="call delreg('$this->regcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
 else
     {
     return false;
 }
    }
    public function disp_rec()
    {
        $con=new clscon();
        $qry="call dispreg()";
        $res=mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    }
    public function find_rec()
    {
        $con=new clscon();
        $qry="call findreg('$this->regcod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->regcod=$r[0];
            $this->regname=$r[1];
            $this->regeml=$r[2];
            $this->regpwd=$r[3];
            $this->regdat=$r[4];
        }
        mysql_close();
    }
    
}
class clsfol
{
   public $folcod,$folnam,$folregcod,$folcrtdat;
   function dspdoccnt($folcod)
    {
        $qry="call dspdoccnt('$folcod',@cnt)";
        $res=  mysql_query($qry);
        $res1=  mysql_query("select @cnt");
        $r=  mysql_fetch_row($res1);
        mysql_close();
        return $r[0];
    }
  public function save_rec()
    {
        $con=new clscon();
        $qry="call insfol('$this->folnam','$this->folregcod','$this->folcrtdat')";
        $res=  mysql_query($qry) or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
               {
     return false;
   }
    }
  public function update_rec()
    {
        $con=new clscon();
        $qry="call updfol('$this->folcod','$this->folnam','$this->folregcod','$this->folcrtdat')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }
  public function delete_rec()
    {
        $con=new clscon();
        $qry="call delfol('$this->folcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
 else
     {
     return false;
 }
    } 
  public function disp_rec($regcod)
    {
        $con=new clscon();
        $qry="call dspfol('$regcod')";
        $res=mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r= mysql_fetch_array($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    } 
  public function find_rec()
    {
        $con=new clscon();
        $qry="call findfol('$this->regcod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->folcod=$r[0];
            $this->folnam=$r[1];
            $this->folregcod=$r[2];
            $this->folcrtdat=$r[3];
          }
        mysql_close();
    }
 }
 class clsfil
 {
     public $filcod,$filnam,$filupldat,$filfolcod,$fildwnfil,$filhidsts;
     public function save_rec()
       {
        $con=new clscon();
        
        $qry="call insfil('$this->filnam','$this->filupldat','$this->filfolcod','$this->fildwnfil','$this->filhidsts',@cod)";    
        $res=  mysql_query($qry) or die(mysql_error());
        $res1=  mysql_query("select @cod");
        $r=  mysql_fetch_row($res1);
        return $r[0];
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
               {
     return false;
   }
    }  
    public function update_rec()
   {
        $con=new clscon();
        $qry="call updfil('$this->filcod','$this->filnam','$this->filupldat','$this->filfolcod','$this->fildwnfil','$this->filhidsts')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }  
    public function delete_rec()
    {
        $con=new clscon();
        $qry="call delfil('$this->filcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
 else
     {
     return false;
   }
    }
  public function disp_rec($cod)
    {
        $con=new clscon();
        $qry="call dspmyfil('$cod')";
        $res=mysql_query($qry) or die(mysql_error());
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_array($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    }
    public function find_rec()
    {
        $con=new clscon();
        $qry="call fndfil('$this->filcod')";
        $res=  mysql_query($qry);
        if($r= mysql_fetch_array($res))
        {
            $this->filcod=$r[0];
            $this->filnam=$r[1];
            $this->filupldat=$r[2];
            $this->filfolcod=$r[3];
            $this->fildwnfil=$r[4];
            $this->filhidsts=$r[5];
          }
        mysql_close();
    }
 }
 class clsgrp
 {
    public $grpcod,$grpownregcod,$grpcrtdat,$grpnam;
    public function save_rec()
    {
        $con=new clscon();
        $qry="call insgrp('$this->grpownregcod','$this->grpcrtdat','$this->grpnam')";
        $res=mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
               {
     return false;
   }
     }  
    public function update_rec()
   {
        $con=new clscon();
        $qry="call updgrp('$this->grpcod','$this->grpownregcod','$this->grpcrtdat')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }   
     public function delete_rec()
    {
        $con=new clscon();
        $qry="call delgrp('$this->grpcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
 else
     {
     return false;
   }
    }
    public function disp_rec($ownregcod)
    {
        $con=new clscon();
        $qry="call dspgrp('$ownregcod')";
        $res=  mysql_query($qry)or die(mysql_error());
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    }
     public function find_rec($grp)
    {
        $con=new clscon();
        $qry="call findgrp('$this->grpcod')";
        $res=  mysql_query($qry);
        if($r=  mysql_fetch_array($res))
        {
            $this->grpcod=$r[0];
            $this->grpownregcod=$r[1];
            $this->grpcrtdat=$r[2];
            $this->grpnam=$r[3];
         }
        mysql_close();
    }
 }
 class clsgrpmem
 {
  public $grpmemcod,$grpmemgrpcod,$grpmemregcod;
     public function save_rec()
    {
        $con=new clscon();
        $qry="call insgrpmem('$this->grpmemgrpcod','$this->grpmemregcod')";
        $res=mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
               {
     return false;
      }
      } 
      public function update_rec()
   {
        $con=new clscon();
        $qry="call updgrpmem('$this->grpmemcod','$this->grpownregcod','$this->grpcrtdat')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }  
         public function delete_rec()
    {
           $con=new clscon();
        $qry="call delgrpmem('$this->grpmemcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
    else
     {
     return false;
   }
  }
    public function disp_rec()
    {
        $con=new clscon();
        $qry="call dispgrpmem()";
        $res=mysql_query($qry);
        $objarr=array();
        $i=o;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
       }
        public function find_rec()
         {
        $con=new clscon();
        $qry="call findgrpmem('$this->grpmemcod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->grpmemcod=$r[0];
            $this->grpmemgrpcod=$r[1];
            $this->grpmemregcod=$r[2];
         }
        mysql_close();
       }
   }
 class clsshr
 {
  public $shrcod,$shrfilcod,$shrdat,$shrtyp,$shrreggrpcod;
  public function save_rec()
    {
        $con=new clscon();
        $qry="call insshr('$this->shrfilcod','$this->shrdat,'$this->shrtyp',$this->shrreggrpcod)";
        $res=mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
        {
           return false;
       }
     } 
   public function update_rec()
   {
        $con=new clscon();
        $qry="call updshr('$this->shrcod','$this->shrfilcod','$this->shrdat','$this->shrtyp','$this->shrreggrpcod')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }
   public function delete_rec()
    {
           $con=new clscon();
        $qry="call delshr('$this->shrcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
      return false;
     }
  }
    public function disp_rec($dcod)
    {
        $con=new clscon();
//        $qry="call disshr()";
        $qry="call dspshared('$dcod')";
        $res=mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    }
      public function find_rec()
    {
        $con=new clscon();
        $qry="call findshr('$this->shrcod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->shrcod=$r[0];
            $this->shrfilcod=$r[1];
            $this->shrdat=$r[2];
            $this->shrtyp=$r[3];
            $this->shrreggrpcod[4];
         }
        mysql_close();
    }
 }  
 class clscat
 {
  public $catcod,$catnam;
  public function save_rec()
    {
        $con=new clscon();
        $qry="call inscat('$this->catnam')"or die(mysql_error());
        $res =mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        
            return true;
          
          else 
         
            return false;
         
     } 
   public function update_rec()
   {
        $con=new clscon();
        $qry="call updcat('$this->catcod','$this->catnam')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
      {
         return false;
      
    }
   }
   public function delete_rec()
    {
           $con=new clscon();
        $qry="call delcat('$this->catcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
      {
       return false;
       }
     }
     function disp_rec()
    {
        $con=new clscon();
        $qry="call dspcat()";
        $res=mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        }
      
      public function find_rec()
    {
        $con=new clscon();
        $qry="call fndcat('$this->catcod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->catcod=$r[0];
            $this->catnam=$r[1];
         }
        mysql_close();
     }
     }  
 class clsseldoc
 {
  public $seldoccod,$seldocregcod,$seldoctit,$seldocdsc,$seldocfil,$seldocprc,$seldoccatcod;
  public function save_rec()
    {
        $con=new clscon();
        $qry="call insseldoc('$this->seldocregcod','$this->seldoctit','$this->seldocdsc','$this->seldocfil','$this->seldocprc','$thisseldoccatcod')";
        $res=mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
       {
          return false;
       }
     } 
   public function update_rec()
   {
     $con=new clscon();
     $qry="call updseldoc('$this->seldoccod','$this->seldocregcod','$this->seldoctit','$this->seldocdsc','$this->seldocfil','$this->seldocprc',$this->seldoccatcod')";
     $res=  mysql_query($qry);
     $d=  mysql_affected_rows();
      mysql_close();
      if($d==1)
        {
            return true;
        }
      else
     {
     return false;
   }
    }  
   public function delete_rec()
    {
        $con=new clscon();
        $qry="call delseldoc('$this->seldoccod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
else
     {
     return false;
     }
  }
    public function disp_rec()
    {
        $con=new clscon();
        $qry="call disseldoc()";
        $res=mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    }
      public function find_rec()
    {
        $con=new clscon();
        $qry="call findseldoc('$this->seldoccod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->seldoccod=$r[0];
            $this->seldocregcod=$r[1];
            $this->seldoctit=$r[2];
            $this->seldocdsc=$r[3];
            $this->seldocfil=$r[4];
            $this->seldocprc=$r[5];
            $this->seldoccatcod=$r[6];
         }
        mysql_close();
    }
 }  
 class clspur
 {
  public $purcod,$purdat,$purregcod,$purseldoccod;
  public function save_rec()
    {
        $con=new clscon();
        $qry="call inspur('$this->purdat','$this->purregcod','$this->purseldoccod')";
        $res=mysql_query($qry);
        $d=mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
          }
          else 
         {
            return false;
          }
     } 
   public function update_rec()
   {
        $con=new clscon();
        $qry="call updpur('$this->purcod','$this->purdat','$this->purregcod','$this->purseldoccod')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
     {
       return false;
      }
    }  
   public function delete_rec()
    {
           $con=new clscon();
        $qry="call delpur('$this->purcod')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
        {
            return true;
        }
      else
        {
         return false;
        }
        }
    public function disp_rec()
    {
        $con=new clscon();
        $qry="call dispur()";
        $res=mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r=  mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
            mysql_close();
            return $objarr;
        
    }
      public function find_rec()
    {
        $con=new clscon();
        $qry="call findpur('$this->purcod')";
        $res=  mysql_query($qry);
        if($r=mysql_fetch_array($res))
        {
            $this->purcod=$r[0];
            $this->purdat=$r[1];
            $this->purregcod=$r[2];
            $this->purseldoccod=$r[3];
         }
        mysql_close();
    }
 }  
 ?>



