

    <?php
    class Utilities{
        public function randomStrGenerator()
    {
        $tmp = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $reference = '';
        $len = strlen($tmp);
        for ($i = 0; $i < 8; $i++)
            $reference .= $tmp[rand() & ($len - 1)];
        return $reference;
        
    }
    }
?>