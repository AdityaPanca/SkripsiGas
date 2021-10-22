<?php
    
    $temperature = $_COOKIE['suhu'];
    $kadargas = $_COOKIE['gas'];
    
    $alfa = array();

    $z = array();

    $hasil = 0;

    $hasil = round(perhitungan(25,100));


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

    function kipasPelan(){
            return 1;
    }

    function kipasSedang(){
            return 2;
    }

    function kipasCepat(){
            return 3;
    }


    function perhitungan($temperature, $kadargas){
        $alfa[0] = findMin(tempDingin($temperature), gasAman($kadargas));
        $z[0] = kipasPelan();

        $alfa[1] = findMin(tempDingin($temperature), gasBahaya($kadargas));
        $z[1] = kipasCepat();

        $alfa[2] = findMin(tempNormal($temperature), gasAman($kadargas));
        $z[2] = kipasSedang();

        $alfa[3] = findMin(tempNormal($temperature), gasBahaya($kadargas));
        $z[3] = kipasCepat();

        $alfa[4] = findMin(tempPanas($temperature), gasAman($kadargas));
        $z[4] = kipasCepat();

        $alfa[5] = findMin(tempPanas($temperature), gasBahaya($kadargas));
        $z[5] = kipasCepat();

        
        $temp_1 = 0;
        $temp_2 = 0;
        $hasil = 0;
        
        for($i = 0; $i < 6; $i++){
            $temp_1 = $temp_1 + $alfa[$i] * $z[$i];
            $temp_2 = $temp_2 + $alfa[$i];
        }
        $hasil = $temp_1 / $temp_2;
        return $hasil;
    }
    echo $hasil;

   
?>