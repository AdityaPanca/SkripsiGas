<?php
    
    $temperature = $_COOKIE['suhu'];
    $kadargas = $_COOKIE['gas'];
    
    $beta = array();

    $zz = array();

    $hasil2 = 0;

    $hasil2 = perhitungan2($temperature, 0);


    function findMin($x, $y){
        if($x <= $y){
            return $x;
        } else{
            return $y;
        }
    }

    function tempDingin($temperature){
        if($temperature <= 0){
            return 1;
        } elseif ($temperature > 0 && $temperature < 25){
            return (25 - $temperature) / (25-0);
        } else{
            return 0;
        }
    }

    function tempNormal($temperature){
        if($temperature > 20 && $temperature <= 25){
            return ($temperature - 20) / (25-20);
        } elseif($temperature > 25 && $temperature < 30){
            return (30 - $temperature) / (30-25);
        } else{
            return 0;
        }
    }

    function tempPanas($temperature){
        if($temperature <= 25){
            return 0;
        } elseif ($temperature > 25 && $temperature < 40){
            return ($temperature - 25) / (40-25);
        } else{
            return 1;
        }
    }

    function gasAman($kadargas){
        if($kadargas <= 0){
            return 1;
        } elseif ($kadargas > 0 && $kadargas < 160){
            return (160 - $kadargas) / (160-0);
        } else{
            return 0;
        }
    }

    function gasBahaya($kadargas){
        if($kadargas <= 150){
            return 0;
        } elseif($kadargas > 150 && $kadargas < 500){
            return ($kadargas - 150) / (500 - 150);
        } else{
            return 1;
        }
    }

    function kipasHidup($alfa){
        if($alfa <= 0){
            return 0;
        } else{
            return 1;
        }
    }

    function kipasMati($alfa){
        if($alfa <= 0){
            return 1;
        } else{
            return 0;
        }
    }

    function buzzerHidup(){
        return 1;
    }

    function buzzerMati(){
        return 0;
    }


    function perhitungan2($temperature, $kadargas){
        $beta[0] = findMin(tempDingin($temperature), gasAman($kadargas));
        $zz[0] = buzzerMati($beta[0]);

        $beta[1] = findMin(tempDingin($temperature), gasBahaya($kadargas));
        $zz[1] = buzzerHidup($beta[1]);

        $beta[2] = findMin(tempNormal($temperature), gasAman($kadargas));
        $zz[2] = buzzerMati($beta[2]);

        $beta[3] = findMin(tempNormal($temperature), gasBahaya($kadargas));
        $zz[3] = buzzerHidup($beta[3]);

        $beta[4] = findMin(tempPanas($temperature), gasAman($kadargas));
        $zz[4] = buzzerMati($beta[4]);

        $beta[5] = findMin(tempPanas($temperature), gasBahaya($kadargas));
        $zz[5] = buzzerHidup($beta[5]);

        
        $temp_3 = 0;
        $temp_4 = 0;
        $hasil2 = 0;

        for($i = 0; $i < 6; $i++){
            $temp_3 = $temp_3 + $beta[$i] * $zz[$i];
            $temp_4 = $temp_4 + $beta[$i];
        }
        $hasil2 = $temp_3 / $temp_4;
        return $hasil2;
    }
    
    echo $hasil2;
   
?>
